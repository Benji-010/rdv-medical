<?php

require_once __DIR__ . '/Database.php';

class MedecinService
{
    // Dossier où les photos envoyées sont rangées, et chemin enregistré dans la base.
    private const DOSSIER_PHOTOS = __DIR__ . '/../public/assets/img/medecins/';
    private const CHEMIN_PHOTOS  = 'assets/img/medecins/';

    // Taille maximale d'une photo : 2 Mo.
    private const TAILLE_MAX = 2 * 1024 * 1024;

    // Types d'image acceptés et extension du fichier enregistré.
    private const TYPES_AUTORISES = [
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/webp' => 'webp',
    ];

    public static function valider(array $d, ?array $fichier = null): array
    {
        $erreurs = [];

        // Nom, postnom, prénom et spécialité : obligatoires, 100 caractères maximum.
        $champs = [
            'medecin_nom'        => 'Le nom',
            'medecin_postnom'    => 'Le postnom',
            'medecin_prenom'     => 'Le prénom',
            'medecin_specialite' => 'La spécialité',
        ];
        foreach ($champs as $champ => $libelle) {
            $valeur = trim($d[$champ] ?? '');
            if ($valeur === '') {
                $erreurs[] = "$libelle est obligatoire.";
            } elseif (mb_strlen($valeur) > 100) {
                $erreurs[] = "$libelle est trop long (100 caractères maximum).";
            }
        }

        // La photo est facultative
        if (self::fichierEnvoye($fichier)) {
            $erreurs = array_merge($erreurs, self::validerPhoto($fichier));
        }

        return $erreurs;
    }

    // Vrai si l'utilisateur a réellement choisi un fichier dans le formulaire.
    private static function fichierEnvoye(?array $fichier): bool
    {
        return $fichier !== null && ($fichier['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_NO_FILE;
    }

    private static function validerPhoto(array $fichier): array
    {
        // Erreurs d'envoi signalées par PHP (fichier plus gros que la limite du serveur, etc.).
        if ($fichier['error'] === UPLOAD_ERR_INI_SIZE || $fichier['error'] === UPLOAD_ERR_FORM_SIZE) {
            return ['La photo est trop volumineuse (2 Mo maximum).'];
        }
        if ($fichier['error'] !== UPLOAD_ERR_OK) {
            return ['La photo n’a pas pu être envoyée. Réessayez.'];
        }

        if ($fichier['size'] > self::TAILLE_MAX) {
            return ['La photo est trop volumineuse (2 Mo maximum).'];
        }

        // On regarde le CONTENU du fichier, pas son nom : un fichier renommé en .jpg mais qui n'est pas une image est refusé.
        $type = (new finfo(FILEINFO_MIME_TYPE))->file($fichier['tmp_name']);
        if (!isset(self::TYPES_AUTORISES[$type]) || @getimagesize($fichier['tmp_name']) === false) {
            return ['La photo doit être une image JPEG, PNG ou WebP.'];
        }

        return [];
    }

    private static function filtre(string $recherche, string $specialite): array
    {
        $conditions = [];
        $params     = [];

        if ($recherche !== '') {
            $conditions[] = '(medecin_nom LIKE ? OR medecin_postnom LIKE ? OR medecin_prenom LIKE ?)';
            $motif = '%' . $recherche . '%';
            array_push($params, $motif, $motif, $motif);
        }
        if ($specialite !== '') {
            $conditions[] = 'medecin_specialite = ?';
            $params[]     = $specialite;
        }

        $where = $conditions ? 'WHERE ' . implode(' AND ', $conditions) : '';
        return [$where, $params];
    }

    // Liste une page de médecins (10 par défaut), triés par nom.
    public static function lister(string $recherche = '', string $specialite = '', int $limite = 10, int $decalage = 0): array
    {
        [$where, $params] = self::filtre($recherche, $specialite);

        $limite   = max(1, $limite);
        $decalage = max(0, $decalage);

        $sql = "SELECT * FROM medecin $where
                ORDER BY medecin_nom, medecin_postnom, medecin_prenom
                LIMIT $limite OFFSET $decalage";

        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Nombre de médecins correspondant à la recherche et à la spécialité (tous si vides).
    public static function compter(string $recherche = '', string $specialite = ''): int
    {
        [$where, $params] = self::filtre($recherche, $specialite);

        $stmt = Database::getConnection()->prepare("SELECT COUNT(*) FROM medecin $where");
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    public static function specialites(): array
    {
        $stmt = Database::getConnection()->query(
            'SELECT DISTINCT medecin_specialite FROM medecin ORDER BY medecin_specialite'
        );
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // Renvoie un médecin (tableau) ou null s'il n'existe pas.
    public static function trouver(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM medecin WHERE id_medecin = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null; // fetch() renvoie false si rien n'est trouvé
    }

    // Ajoute un médecin et renvoie son nouveau numéro (id_medecin).
    public static function ajouter(array $d, ?array $fichier = null): int
    {
        $pdo   = Database::getConnection();
        $photo = self::enregistrerPhoto($fichier);

        try {
            $stmt = $pdo->prepare(
                'INSERT INTO medecin (medecin_nom, medecin_postnom, medecin_prenom, medecin_specialite, medecin_photo)
                 VALUES (?, ?, ?, ?, ?)'
            );
            $stmt->execute([...self::valeurs($d), $photo]);
            return (int) $pdo->lastInsertId(); 
        } catch (PDOException $e) {
            self::supprimerFichier($photo);
            throw $e;
        }
    }

    // Modifie un médecin existant. Sans nouvelle photo, l'ancienne est conservée.
    public static function modifier(int $id, array $d, ?array $fichier = null): void
    {
        $ancien = self::trouver($id);
        if ($ancien === null) {
            throw new RuntimeException('Ce médecin n’existe pas.');
        }

        $nouvellePhoto = self::enregistrerPhoto($fichier);
        $photo = $nouvellePhoto ?? $ancien['medecin_photo']; // "??" : valeur de secours si null

        try {
            $stmt = Database::getConnection()->prepare(
                'UPDATE medecin SET medecin_nom = ?, medecin_postnom = ?, medecin_prenom = ?,
                        medecin_specialite = ?, medecin_photo = ?
                 WHERE id_medecin = ?'
            );
            $stmt->execute([...self::valeurs($d), $photo, $id]);
        } catch (PDOException $e) {
            self::supprimerFichier($nouvellePhoto);
            throw $e;
        }

        // Tout s'est bien passé : on supprime l'ancienne photo, devenue inutile.
        if ($nouvellePhoto !== null) {
            self::supprimerFichier($ancien['medecin_photo']);
        }
    }

    // Supprime un médecin, SAUF s'il a des rendez-vous (on garde l'historique).
    // Ses horaires de travail et ses absences sont supprimés avec lui.
    public static function supprimer(int $id): void
    {
        $medecin = self::trouver($id);
        if ($medecin === null) {
            throw new RuntimeException('Ce médecin n’existe pas.');
        }

        $pdo = Database::getConnection();

        // Un médecin avec des rendez-vous ne peut pas être supprimé.
        $stmt = $pdo->prepare('SELECT COUNT(*) FROM rendez_vous WHERE id_medecin = ?');
        $stmt->execute([$id]);
        if ((int) $stmt->fetchColumn() > 0) {
            throw new RuntimeException('Ce médecin a des rendez-vous, il ne peut pas être supprimé.');
        }

        try {
            $pdo->beginTransaction();
            foreach (['disponibilite_medecin', 'indisponibilite_medecin', 'medecin'] as $table) {
                $stmt = $pdo->prepare("DELETE FROM $table WHERE id_medecin = ?");
                $stmt->execute([$id]);
            }
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            if ($e->getCode() === '23000') {
            throw new RuntimeException('Ce médecin a des rendez-vous, il ne peut pas être supprimé.');
        }
            throw $e;
        }

        self::supprimerFichier($medecin['medecin_photo']);
    }

    private static function valeurs(array $d): array
    {
        return [
            trim($d['medecin_nom']),
            trim($d['medecin_postnom']),
            trim($d['medecin_prenom']),
            trim($d['medecin_specialite']),
        ];
    }

    private static function enregistrerPhoto(?array $fichier): ?string
    {
        if (!self::fichierEnvoye($fichier)) {
            return null;
        }

        $type      = (new finfo(FILEINFO_MIME_TYPE))->file($fichier['tmp_name']);
        $extension = self::TYPES_AUTORISES[$type];

        // Nom aléatoire
        $nom = bin2hex(random_bytes(8)) . '.' . $extension;

        if (!is_dir(self::DOSSIER_PHOTOS)) {
            mkdir(self::DOSSIER_PHOTOS, 0755, true);
        }
        if (!move_uploaded_file($fichier['tmp_name'], self::DOSSIER_PHOTOS . $nom)) {
            throw new RuntimeException('La photo n’a pas pu être enregistrée.');
        }

        return self::CHEMIN_PHOTOS . $nom;
    }

    // Supprime un fichier photo, mais seulement s'il se trouve dans notre dossier
    private static function supprimerFichier(?string $chemin): void
    {
        if ($chemin === null || strpos($chemin, self::CHEMIN_PHOTOS) !== 0) {
            return;
        }
        $fichier = self::DOSSIER_PHOTOS . basename($chemin);
        if (is_file($fichier)) {
            unlink($fichier);
        }
    }
}