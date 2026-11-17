<?php
require_once __DIR__ . '/Database.php';

class Auth
{
    // Démarrer la session
    public static function demarrerSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'httponly' => true,
                'samesite' => 'Lax', 
            ]);
            session_start();
        }
    }

    // Vérifie l'identifiant et le mot de passe saisis.
    public static function connecter(string $login, string $motDePasse): bool
    {
        self::demarrerSession();

        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(
            'SELECT id_utilisateur, utilisateur_login, utilisateur_mot_de_passe
             FROM utilisateur WHERE utilisateur_login = ?'
        );
        $stmt->execute([$login]);
        $utilisateur = $stmt->fetch();

        if (!$utilisateur
            || !password_verify($motDePasse, $utilisateur['utilisateur_mot_de_passe'])) {
            return false;
        }

        session_regenerate_id(true);

        $_SESSION['id_utilisateur'] = (int) $utilisateur['id_utilisateur'];
        $_SESSION['utilisateur_login'] = $utilisateur['utilisateur_login'];

        return true;
    }

    // Admin connecté, accès aux bons menus.
    public static function estConnecte(): bool
    {
        self::demarrerSession();
        return isset($_SESSION['id_utilisateur']);
    }

    public static function exigerConnexion(): void
    {
        if (!self::estConnecte()) {
            header('Location: login.php');
            exit;                          
        }
    }

    // Déconnecte l'admin : vide la session et supprime son cookie.
    public static function deconnecter(): void
    {
        self::demarrerSession();

        $_SESSION = [];

        // Supprime le cookie de session dans le navigateur.
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }

        session_destroy();
    }
}