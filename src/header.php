<?php
// Partie commune du haut de page : <head>, en-tête et menu.
require_once __DIR__ . '/Auth.php';

$titrePage  = $titrePage  ?? 'Accueil';
$pageActive = $pageActive ?? '';
$cssPage    = $cssPage    ?? '';

// Auth::estConnecte() démarre la session.
$estAdmin = Auth::estConnecte();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($titrePage) ?> | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <?php if ($cssPage !== ''): ?>
    <link rel="stylesheet" href="assets/css/<?= htmlspecialchars($cssPage) ?>">
    <?php endif; ?>
</head>
<body>
    <a class="lien-evitement" href="#contenu">Aller au contenu</a>

    <header class="entete">
        <div class="conteneur entete-interieur">

            <a class="logo" href="<?= $estAdmin ? 'tableau-de-bord.php' : 'index.php' ?>">
                <svg viewBox="0 0 32 32" aria-hidden="true">
                    <rect width="32" height="32" rx="8" fill="#1f6feb"/>
                    <path d="M5 17h6l3-7 4 13 3-8 2 2h4" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span class="logo-texte">
                    <strong>Clinique Santé Plus</strong>
                    <small>Votre santé, notre priorité</small>
                </span>
            </a>

            <button class="menu-bouton" type="button" aria-expanded="false" aria-controls="menu-principal">Menu</button>

            <?php require __DIR__ . '/navbar.php'; ?>
        </div>
    </header>