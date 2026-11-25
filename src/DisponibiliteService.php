<?php
require_once __DIR__ . '/Database.php';

class DisponibiliteService
{
    private const JOURS = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    private const MOTIFS = [
        'medecin' => ['Congé annuel', 'Congé maladie', 'Absence autorisée', 'Formation', 'Réunion médicale'],
        'salle'   => ['Désinfection', 'Fermeture temporaire', 'Maintenance', 'Nettoyage approfondi', 'Panne technique'],
    ];

    // Tables de chaque cible ; les colonnes suivent le préfixe de la table (pre)
    private const CIBLES = [
        'medecin' => [
            'libelle' => 'Ce médecin',
            'parent'  => 'medecin',
            'cle'     => 'id_medecin',
            'nom'     => "CONCAT(p.medecin_prenom, ' ', p.medecin_nom, ' ', p.medecin_postnom)",
            'horaire' => ['table' => 'disponibilite_medecin', 'pk' => 'id_disponibilite_medecin', 'pre' => 'disponibilite_medecin', 'actif' => 'Actif'],
            'absence' => ['table' => 'indisponibilite_medecin', 'pk' => 'id_indisponibilite_medecin', 'pre' => 'indisponibilite_medecin'],
        ],
        'salle' => [
            'libelle' => 'Cette salle',
            'parent'  => 'salle',
            'cle'     => 'id_salle',
            'nom'     => 'p.salle_nom',
            'horaire' => ['table' => 'disponibilite_salle', 'pk' => 'id_disponibilite_salle', 'pre' => 'disponibilite_salle', 'actif' => 'Ouverte'],
            'absence' => ['table' => 'indisponibilite_salle', 'pk' => 'id_indisponibilite_salle', 'pre' => 'indisponibilite_salle'],
        ],
    ];

    public static function jours(): array
    {
        return self::JOURS;
    }

    public static function motifs(string $cible): array
    {
        return self::MOTIFS[$cible] ?? [];
    }

    private static function cfg(string $cible): array
    {
        if (!isset(self::CIBLES[$cible])) {
            throw new InvalidArgumentException('Cible inconnue.');
        }
        return self::CIBLES[$cible];
    }

    // Renvoie la date au format SQL (AAAA-MM-JJ) ou null si elle est invalide
    private static function dateSql(?string $v): ?string
    {
        $v = trim((string) $v);
        $d = DateTime::createFromFormat('Y-m-d', $v);
        return ($d && $d->format('Y-m-d') === $v) ? $v : null;
    }

    // Renvoie l'heure au format HH:MM:SS ou null si elle est invalide
    private static function heureSql(?string $v): ?string
    {
        if (!preg_match('/^([01]\d|2[0-3]):([0-5]\d)(:[0-5]\d)?$/', trim((string) $v), $m)) {
            return null;
        }
        return $m[1] . ':' . $m[2] . ':00';
    }

    private static function parentExiste(array $c, int $id): bool
    {
        $stmt = Database::getConnection()->prepare("SELECT COUNT(*) FROM {$c['parent']} WHERE {$c['cle']} = ?");
        $stmt->execute([$id]);
        return (int) $stmt->fetchColumn() > 0;
    }

    private static function erreurParent(string $cible): string
    {
        return $cible === 'medecin' ? 'Choisissez un médecin.' : 'Choisissez une salle.';
    }

    // ---------------------------------------------------------------
    //  HORAIRES (disponibilités)
    // ---------------------------------------------------------------

    // Champs attendus : id_medecin ou id_salle, jours[], heure_debut, heure_fin, valide_du, valide_au
    public static function validerHoraires(string $cible, array $d): array
    {
        $c = self::cfg($cible);
        $erreurs = [];

        if (!self::parentExiste($c, (int) ($d[$c['cle']] ?? 0))) {
            $erreurs[] = self::erreurParent($cible);
        }

        $jours = $d['jours'] ?? [];
        if (!is_array($jours) || !$jours) {
            $erreurs[] = 'Choisissez au moins un jour.';
        } elseif (array_diff($jours, self::JOURS)) {
            $erreurs[] = 'Un des jours choisis est invalide.';
        }

        $debut = self::heureSql($d['heure_debut'] ?? '');
        $fin   = self::heureSql($d['heure_fin'] ?? '');
        if ($debut === null || $fin === null) {
            $erreurs[] = 'Les heures sont invalides.';
        } elseif ($fin <= $debut) {
            $erreurs[] = 'L’heure de fin doit être après l’heure de début.';
        }

        $du = self::dateSql($d['valide_du'] ?? '');
        $au = self::dateSql($d['valide_au'] ?? '');
        if ($du === null || $au === null) {
            $erreurs[] = 'Les dates de validité sont invalides.';
        } elseif ($au < $du) {
            $erreurs[] = 'La fin de validité doit être égale ou postérieure au début.';
        }

        return $erreurs;
    }

    // Une ligne par jour choisi ; renvoie le nombre de lignes ajoutées.
    // Appeler validerHoraires() avant. Lance RuntimeException en cas de chevauchement.
    public static function ajouterHoraires(string $cible, array $d): int
    {
        $c  = self::cfg($cible);
        $h  = $c['horaire'];
        $p  = $h['pre'];
        $id = (int) $d[$c['cle']];

        $debut = self::heureSql($d['heure_debut']);
        $fin   = self::heureSql($d['heure_fin']);
        $du    = self::dateSql($d['valide_du']);
        $au    = self::dateSql($d['valide_au']);

        $pdo = Database::getConnection();
        $nb  = 0;

        $pdo->beginTransaction();
        try {
            $verif = $pdo->prepare(
                "SELECT COUNT(*) FROM {$h['table']}
                 WHERE {$c['cle']} = ? AND {$p}_jour = ? AND {$p}_statut = ?
                   AND {$p}_heure_debut < ? AND {$p}_heure_fin > ?
                   AND {$p}_valide_du <= ? AND {$p}_valide_au >= ?"
            );
            $ajout = $pdo->prepare(
                "INSERT INTO {$h['table']}
                    ({$p}_jour, {$p}_heure_debut, {$p}_heure_fin, {$p}_valide_du, {$p}_valide_au, {$p}_statut, {$c['cle']})
                 VALUES (?, ?, ?, ?, ?, ?, ?)"
            );

            foreach (array_unique($d['jours']) as $jour) {
                $verif->execute([$id, $jour, $h['actif'], $fin, $debut, $au, $du]);
                if ((int) $verif->fetchColumn() > 0) {
                    throw new RuntimeException("{$c['libelle']} a déjà un horaire qui chevauche celui-ci le $jour.");
                }
                $ajout->execute([$jour, $debut, $fin, $du, $au, $h['actif'], $id]);
                $nb++;
            }

            $pdo->commit();
        } catch (Throwable $e) {
            $pdo->rollBack();
            throw $e;
        }

        return $nb;
    }

    // Liste les horaires (de toutes les cibles, ou d'une seule si $idCible > 0)
    public static function horaires(string $cible, int $idCible = 0): array
    {
        $c = self::cfg($cible);
        $h = $c['horaire'];
        $p = $h['pre'];

        $jours = "'" . implode("','", self::JOURS) . "'"; // liste fixe, sans saisie utilisateur
        $where = $idCible > 0 ? "WHERE t.{$c['cle']} = ?" : '';

        $stmt = Database::getConnection()->prepare(
            "SELECT t.{$h['pk']} AS id, t.{$c['cle']} AS id_cible, {$c['nom']} AS nom,
                    t.{$p}_jour AS jour, t.{$p}_heure_debut AS heure_debut, t.{$p}_heure_fin AS heure_fin,
                    t.{$p}_valide_du AS valide_du, t.{$p}_valide_au AS valide_au, t.{$p}_statut AS statut
             FROM {$h['table']} t
             JOIN {$c['parent']} p ON p.{$c['cle']} = t.{$c['cle']}
             $where
             ORDER BY nom, FIELD(t.{$p}_jour, $jours), t.{$p}_heure_debut"
        );
        $stmt->execute($idCible > 0 ? [$idCible] : []);
        return $stmt->fetchAll();
    }

    public static function supprimerHoraire(string $cible, int $id): void
    {
        $h = self::cfg($cible)['horaire'];
        self::supprimer($h['table'], $h['pk'], $id, 'Cet horaire n’existe pas.');
    }

    // ---------------------------------------------------------------
    //  ABSENCES et FERMETURES (indisponibilités)
    // ---------------------------------------------------------------

    // Champs attendus : id_medecin ou id_salle, date_debut, date_fin, heure_debut, heure_fin, motif
    public static function validerAbsence(string $cible, array $d): array
    {
        $c = self::cfg($cible);
        $erreurs = [];

        if (!self::parentExiste($c, (int) ($d[$c['cle']] ?? 0))) {
            $erreurs[] = self::erreurParent($cible);
        }

        $dd = self::dateSql($d['date_debut'] ?? '');
        $df = self::dateSql($d['date_fin'] ?? '');
        if ($dd === null || $df === null) {
            $erreurs[] = 'Les dates sont invalides.';
        } elseif ($df < $dd) {
            $erreurs[] = 'La date de fin doit être égale ou postérieure à la date de début.';
        }

        $hd = self::heureSql($d['heure_debut'] ?? '');
        $hf = self::heureSql($d['heure_fin'] ?? '');
        if ($hd === null || $hf === null) {
            $erreurs[] = 'Les heures sont invalides.';
        } elseif ($dd !== null && $dd === $df && $hf <= $hd) {
            $erreurs[] = 'L’heure de fin doit être après l’heure de début.';
        }

        if (!in_array($d['motif'] ?? '', self::MOTIFS[$cible], true)) {
            $erreurs[] = 'Le motif est invalide.';
        }

        return $erreurs;
    }

    // Appeler validerAbsence() avant. Lance RuntimeException en cas de chevauchement.
    public static function ajouterAbsence(string $cible, array $d): int
    {
        $c  = self::cfg($cible);
        $a  = $c['absence'];
        $p  = $a['pre'];
        $id = (int) $d[$c['cle']];

        $dd = self::dateSql($d['date_debut']);
        $df = self::dateSql($d['date_fin']);
        $hd = self::heureSql($d['heure_debut']);
        $hf = self::heureSql($d['heure_fin']);

        $pdo = Database::getConnection();
        $pdo->beginTransaction();
        try {
            // Chevauchement : début existant < fin nouvelle ET fin existante > début nouveau
            $verif = $pdo->prepare(
                "SELECT COUNT(*) FROM {$a['table']}
                 WHERE {$c['cle']} = ? AND {$p}_statut <> 'Annulée'
                   AND TIMESTAMP({$p}_date_debut, {$p}_heure_debut) < TIMESTAMP(?, ?)
                   AND TIMESTAMP({$p}_date_fin, {$p}_heure_fin) > TIMESTAMP(?, ?)"
            );
            $verif->execute([$id, $df, $hf, $dd, $hd]);
            if ((int) $verif->fetchColumn() > 0) {
                throw new RuntimeException("{$c['libelle']} a déjà une période d’indisponibilité qui chevauche celle-ci.");
            }

            $stmt = $pdo->prepare(
                "INSERT INTO {$a['table']}
                    ({$p}_date_debut, {$p}_date_fin, {$p}_heure_debut, {$p}_heure_fin, {$p}_motif, {$p}_statut, {$c['cle']})
                 VALUES (?, ?, ?, ?, ?, 'Validée', ?)"
            );
            $stmt->execute([$dd, $df, $hd, $hf, $d['motif'], $id]);

            $pdo->commit();
        } catch (Throwable $e) {
            $pdo->rollBack();
            throw $e;
        }

        return 1;
    }

    public static function absences(string $cible, int $idCible = 0): array
    {
        $c = self::cfg($cible);
        $a = $c['absence'];
        $p = $a['pre'];

        $where = $idCible > 0 ? "WHERE t.{$c['cle']} = ?" : '';

        $stmt = Database::getConnection()->prepare(
            "SELECT t.{$a['pk']} AS id, t.{$c['cle']} AS id_cible, {$c['nom']} AS nom,
                    t.{$p}_date_debut AS date_debut, t.{$p}_date_fin AS date_fin,
                    t.{$p}_heure_debut AS heure_debut, t.{$p}_heure_fin AS heure_fin,
                    t.{$p}_motif AS motif, t.{$p}_statut AS statut
             FROM {$a['table']} t
             JOIN {$c['parent']} p ON p.{$c['cle']} = t.{$c['cle']}
             $where
             ORDER BY t.{$p}_date_debut DESC, nom"
        );
        $stmt->execute($idCible > 0 ? [$idCible] : []);
        return $stmt->fetchAll();
    }

    public static function supprimerAbsence(string $cible, int $id): void
    {
        $a = self::cfg($cible)['absence'];
        self::supprimer($a['table'], $a['pk'], $id, 'Cette période n’existe pas.');
    }

    private static function supprimer(string $table, string $pk, int $id, string $messageIntrouvable): void
    {
        $stmt = Database::getConnection()->prepare("DELETE FROM $table WHERE $pk = ?");
        $stmt->execute([$id]);
        if ($stmt->rowCount() === 0) {
            throw new RuntimeException($messageIntrouvable);
        }
    }
}