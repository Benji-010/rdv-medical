<!-- Page de connexion à la base de données -->

<?php
class Database {
    // Stockage de la connexion une fois créée

    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        // Créer la connexion si elle n'existe pas encore
        if (self::$instance === null) {
            $config = require __DIR__ . '/../config/database.php';
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

            // Tenter de créer la connexion
            try {
                self::$instance = new PDO($dsn, $config['user'], $config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                    // Protection contre les injections SQL
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            } catch (PDOException $e) {
                // Afficher un message d'erreur sur Apache si la connexion échoue
                die('Erreur de connexion à la base de données.');
            }
        }
        // Retourner à la connexion existante
        return self::$instance;
    }
}