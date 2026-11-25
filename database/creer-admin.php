<?php
// À lancer une seule fois depuis le terminal, jamais depuis un navigateur
if (PHP_SAPI !== 'cli') {
    exit('Ce script se lance uniquement depuis le terminal.');
}

require __DIR__ . '/../src/Database.php';

echo "Identifiant de l'admin : ";
$login = trim(fgets(STDIN));

echo "Mot de passe (8 caractères minimum) : ";
$motDePasse = trim(fgets(STDIN));

if ($login === '' || strlen($login) > 50) {
    exit("Identifiant invalide (1 à 50 caractères).\n");
}
if (strlen($motDePasse) < 8) {
    exit("Mot de passe trop court (8 caractères minimum).\n");
}

try {
    $pdo = Database::getConnection();

    $verification = $pdo->prepare('SELECT id_utilisateur FROM utilisateur WHERE utilisateur_login = ?');
    $verification->execute([$login]);
    if ($verification->fetch()) {
        exit("Cet identifiant existe déjà.\n");
    }

    // Le mot de passe est enregistré haché, jamais en clair
    $hash = password_hash($motDePasse, PASSWORD_DEFAULT);

    $requete = $pdo->prepare('INSERT INTO utilisateur (utilisateur_login, utilisateur_mot_de_passe) VALUES (?, ?)');
    $requete->execute([$login, $hash]);

    echo "Admin « $login » créé avec succès.\n";
} catch (PDOException $e) {
    echo "Erreur : impossible de créer le compte.\n";
}