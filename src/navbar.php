<?php
// Fabrique un lien du menu. Si $cle correspond à la page courante ($pageActive)
function lienMenu(string $cle, string $fichier, string $texte, string $pageActive): string
{
    $courant = ($cle === $pageActive) ? ' aria-current="page"' : '';
    return '<li><a href="' . $fichier . '"' . $courant . '>' . $texte . '</a></li>';
}
?>
<nav class="menu" id="menu-principal" aria-label="Navigation principale">
    <ul class="menu-liste">
        <?php if ($estAdmin): ?>
            <!-- Menu de l'admin connecté : ses pages de gestion -->
            <?= lienMenu('tableau-de-bord', 'tableau-de-bord.php', 'Tableau de bord', $pageActive) ?>
            <?= lienMenu('patients', 'patients.php', 'Patients', $pageActive) ?>
            <?= lienMenu('gestion-medecins', 'gestion-medecins.php', 'Médecins', $pageActive) ?>
            <?= lienMenu('gestion-salles', 'gestion-salles.php', 'Salles', $pageActive) ?>
            <?= lienMenu('gestion-disponibilites', 'gestion-disponibilites.php', 'Disponibilités', $pageActive) ?>
            <?= lienMenu('rendez-vous', 'liste-rendez-vous.php', 'Rendez-vous', $pageActive) ?>
            <?= lienMenu('statistiques', 'statistiques.php', 'Statistiques', $pageActive) ?>
            <li class="menu-action"><a href="index.php">Voir le site</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        <?php else: ?>
            <!-- Menu du visiteur -->
            <?= lienMenu('accueil', 'index.php', 'Accueil', $pageActive) ?>
            <?= lienMenu('medecins', 'medecins.php', 'Médecins', $pageActive) ?>
            <?= lienMenu('salles', 'salles.php', 'Salles', $pageActive) ?>
            <?= lienMenu('disponibilites', 'disponibilites.php', 'Disponibilités', $pageActive) ?>
            <li class="menu-action"><a class="btn btn-principal" href="demande-rendez-vous.php">Prendre rendez-vous</a></li>
            <?= lienMenu('login', 'login.php', 'Connexion', $pageActive) ?>
        <?php endif; ?>
    </ul>
</nav>