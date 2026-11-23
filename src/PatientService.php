<?php

require_once __DIR__ . '/Database.php';

class PatientService
{
    // Retire les espaces, points, tirets et parenthèses d'un numéro.
    public static function normaliserTelephone(string $tel): string
    {
        return preg_replace('/[\s.\-()]/', '', trim($tel));
    }

    // Vérifie les données d'un formulaire patient CÔTÉ SERVEUR.
    // Renvoie la liste des messages d'erreur (liste vide = tout est valide).
    public static function valider(array $d): array
    {
        $erreurs = [];

        $champsObligatoires = [
            'patient_nom'     => 'Le nom',
            'patient_postnom' => 'Le postnom',
            'patient_prenom'  => 'Le prénom',
        ];
        foreach ($champsObligatoires as $champ => $libelle) {
            $valeur = trim($d[$champ] ?? '');
            if ($valeur === '') {
                $erreurs[] = "$libelle est obligatoire.";
            } elseif (mb_strlen($valeur) > 100) {
                $erreurs[] = "$libelle est trop long (100 caractères maximum).";
            }
        }

        // Le sexe doit être exactement M ou F (le 3e argument true = comparaison stricte).
        if (!in_array($d['patient_sexe'] ?? '', ['M', 'F'], true)) {
            $erreurs[] = 'Le sexe doit être M ou F.';
        }

        // Téléphone : un "+" facultatif suivi de 8 à 14 chiffres, une fois normalisé.
        $tel = self::normaliserTelephone($d['patient_telephone'] ?? '');
        if (!preg_match('/^\+?[0-9]{8,14}$/', $tel)) {
            $erreurs[] = 'Le numéro de téléphone est invalide.';
        }

        // Province, ville et commune : facultatives, 100 caractères maximum.
        foreach (['patient_province', 'patient_ville', 'patient_commune'] as $champ) {
            if (mb_strlen(trim($d[$champ] ?? '')) > 100) {
                $erreurs[] = 'Un champ de l’adresse est trop long (100 caractères maximum).';
                break;
            }
        }

        return $erreurs;
    }


    private static function filtre(string $recherche): array
    {
        if ($recherche === '') {
            return ['', []]; 
        }

        $motif = '%' . $recherche . '%';
        return [
            'WHERE patient_nom LIKE ? OR patient_postnom LIKE ?
                OR patient_prenom LIKE ? OR patient_telephone LIKE ?',
            [$motif, $motif, $motif, $motif],
        ];
    }

    // Liste une page de patients (10 par défaut), triés par nom.
    public static function lister(string $recherche = '', int $limite = 10, int $decalage = 0): array
    {
        [$where, $params] = self::filtre($recherche);

        $limite   = max(1, $limite);
        $decalage = max(0, $decalage);

        $sql = "SELECT * FROM patient $where
                ORDER BY patient_nom, patient_postnom, patient_prenom
                LIMIT $limite OFFSET $decalage";

        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Nombre de patients correspondant à la recherche (tous si elle est vide).
    public static function compter(string $recherche = ''): int
    {
        [$where, $params] = self::filtre($recherche);

        $stmt = Database::getConnection()->prepare("SELECT COUNT(*) FROM patient $where");
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    // Nombre de patients ayant au moins un rendez-vous.
    public static function compterAvecRendezVous(): int
    {
        $stmt = Database::getConnection()->query('SELECT COUNT(DISTINCT id_patient) FROM rendez_vous');
        return (int) $stmt->fetchColumn();
    }

    public static function trouver(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM patient WHERE id_patient = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    // Ajoute un patient et renvoie son nouveau numéro (id_patient).
    public static function ajouter(array $d): int
    {
        $pdo = Database::getConnection();

        try {
            $stmt = $pdo->prepare(
                'INSERT INTO patient (patient_nom, patient_postnom, patient_prenom, patient_sexe,
                                      patient_telephone, patient_province, patient_ville, patient_commune)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
            );
            $stmt->execute(self::valeurs($d));
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            self::traiterErreur($e);
        }
    }

    // Modifie un patient existant.
    public static function modifier(int $id, array $d): void
    {
        try {
            $stmt = Database::getConnection()->prepare(
                'UPDATE patient SET patient_nom = ?, patient_postnom = ?, patient_prenom = ?,
                        patient_sexe = ?, patient_telephone = ?, patient_province = ?,
                        patient_ville = ?, patient_commune = ?
                 WHERE id_patient = ?'
            );
            $stmt->execute([...self::valeurs($d), $id]);
        } catch (PDOException $e) {
            self::traiterErreur($e);
        }
    }

    private static function valeurs(array $d): array
    {
        $ouNull = fn($v) => trim($v ?? '') === '' ? null : trim($v);

        return [
            trim($d['patient_nom']),
            trim($d['patient_postnom']),
            trim($d['patient_prenom']),
            $d['patient_sexe'],
            self::normaliserTelephone($d['patient_telephone']),
            $ouNull($d['patient_province'] ?? null),
            $ouNull($d['patient_ville'] ?? null),
            $ouNull($d['patient_commune'] ?? null),
        ];
    }

    private static function traiterErreur(PDOException $e): never
    {
        if ($e->getCode() === '23000') {
            throw new RuntimeException('Ce numéro de téléphone est déjà utilisé.');
        }
        throw $e;
    }
}