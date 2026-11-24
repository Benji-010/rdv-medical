<?php
require_once __DIR__ . '/Database.php';

class SalleService
{
    // Équipements possibles (une salle peut aussi n'en avoir aucun)
    private const EQUIPEMENTS = ['ECG', 'Echographe', 'IRM', 'Radiologie', 'Scanner'];

    public static function equipements(): array
    {
        return self::EQUIPEMENTS;
    }

    // Renvoie la liste des erreurs (vide = données valides)
    public static function valider(array $d): array
    {
        $erreurs = [];

        $nom = trim($d['salle_nom'] ?? '');
        if ($nom === '') {
            $erreurs[] = 'Le nom de la salle est obligatoire.';
        } elseif (mb_strlen($nom) > 100) {
            $erreurs[] = 'Le nom de la salle est trop long (100 caractères maximum).';
        }

        $equipement = trim($d['salle_equipement'] ?? '');
        if ($equipement !== '' && !in_array($equipement, self::EQUIPEMENTS, true)) {
            $erreurs[] = 'Cet équipement n’est pas reconnu.';
        }

        return $erreurs;
    }

    // Condition partagée par lister() et compter()
    private static function filtre(string $recherche, string $equipement): array
    {
        $conditions = [];
        $params     = [];

        if ($recherche !== '') {
            $conditions[] = 'salle_nom LIKE ?';
            $params[]     = '%' . $recherche . '%';
        }
        if ($equipement !== '') {
            $conditions[] = 'salle_equipement = ?';
            $params[]     = $equipement;
        }

        $where = $conditions ? 'WHERE ' . implode(' AND ', $conditions) : '';
        return [$where, $params];
    }

    public static function lister(string $recherche = '', string $equipement = '', int $limite = 10, int $decalage = 0): array
    {
        [$where, $params] = self::filtre($recherche, $equipement);

        // Forcés en entiers : leur insertion directe dans le SQL est sûre
        $limite   = max(1, $limite);
        $decalage = max(0, $decalage);

        $stmt = Database::getConnection()->prepare(
            "SELECT * FROM salle $where ORDER BY salle_nom LIMIT $limite OFFSET $decalage"
        );
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public static function compter(string $recherche = '', string $equipement = ''): int
    {
        [$where, $params] = self::filtre($recherche, $equipement);

        $stmt = Database::getConnection()->prepare("SELECT COUNT(*) FROM salle $where");
        $stmt->execute($params);
        return (int) $stmt->fetchColumn();
    }

    public static function trouver(int $id): ?array
    {
        $stmt = Database::getConnection()->prepare('SELECT * FROM salle WHERE id_salle = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    // Appeler valider() avant. Renvoie le numéro de la nouvelle salle.
    public static function ajouter(array $d): int
    {
        $pdo = Database::getConnection();

        try {
            $stmt = $pdo->prepare('INSERT INTO salle (salle_nom, salle_equipement) VALUES (?, ?)');
            $stmt->execute(self::valeurs($d));
            return (int) $pdo->lastInsertId();
        } catch (PDOException $e) {
            self::traiterErreur($e);
        }
    }

    public static function modifier(int $id, array $d): void
    {
        try {
            $stmt = Database::getConnection()->prepare(
                'UPDATE salle SET salle_nom = ?, salle_equipement = ? WHERE id_salle = ?'
            );
            $stmt->execute([...self::valeurs($d), $id]);
        } catch (PDOException $e) {
            self::traiterErreur($e);
        }
    }

    // Refusé si la salle a des rendez-vous ; ses horaires et fermetures partent avec elle
    public static function supprimer(int $id): void
    {
        if (self::trouver($id) === null) {
            throw new RuntimeException('Cette salle n’existe pas.');
        }

        $pdo = Database::getConnection();

        $stmt = $pdo->prepare('SELECT COUNT(*) FROM rendez_vous WHERE id_salle = ?');
        $stmt->execute([$id]);
        if ((int) $stmt->fetchColumn() > 0) {
            throw new RuntimeException('Cette salle a des rendez-vous, elle ne peut pas être supprimée.');
        }

        // Transaction : les trois suppressions réussissent ensemble ou aucune n'est faite
        try {
            $pdo->beginTransaction();
            foreach (['disponibilite_salle', 'indisponibilite_salle', 'salle'] as $table) {
                $stmt = $pdo->prepare("DELETE FROM $table WHERE id_salle = ?");
                $stmt->execute([$id]);
            }
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
            if ($e->getCode() === '23000') {
                throw new RuntimeException('Cette salle a des rendez-vous, elle ne peut pas être supprimée.');
            }
            throw $e;
        }
    }

    // Équipement vide = aucun équipement (NULL dans la base)
    private static function valeurs(array $d): array
    {
        $equipement = trim($d['salle_equipement'] ?? '');
        return [trim($d['salle_nom']), $equipement === '' ? null : $equipement];
    }

    // 23000 = nom déjà utilisé (salle_nom est UNIQUE)
    private static function traiterErreur(PDOException $e): never
    {
        if ($e->getCode() === '23000') {
            throw new RuntimeException('Une salle porte déjà ce nom.');
        }
        throw $e;
    }
}