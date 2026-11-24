<?php
require_once __DIR__ . '/../src/Auth.php';
require_once __DIR__ . '/../src/SalleService.php';

Auth::exigerConnexion();

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$erreurs = [];
$donnees = [];
$idModif = (int) ($_GET['modifier'] ?? 0);

// Messages mémorisés avant la redirection (affichés une seule fois)
$succes            = $_SESSION['succes'] ?? '';
$erreurSuppression = $_SESSION['erreur'] ?? '';
unset($_SESSION['succes'], $_SESSION['erreur']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (($_POST['action'] ?? '') === 'supprimer') {
        try {
            SalleService::supprimer((int) ($_POST['id_salle'] ?? 0));
            $_SESSION['succes'] = 'La salle a été supprimée.';
        } catch (RuntimeException $ex) {
            $_SESSION['erreur'] = $ex->getMessage();
        }
        header('Location: gestion-salles.php');
        exit;
    }

    $donnees = $_POST;
    $idModif = (int) ($_POST['id_salle'] ?? 0);
    $erreurs = SalleService::valider($donnees);

    if (!$erreurs) {
        try {
            if ($idModif > 0) {
                SalleService::modifier($idModif, $donnees);
                $_SESSION['succes'] = 'La salle a été modifiée.';
            } else {
                SalleService::ajouter($donnees);
                $_SESSION['succes'] = 'La salle a été enregistrée.';
            }
            header('Location: gestion-salles.php');
            exit;
        } catch (RuntimeException $ex) {
            $erreurs[] = $ex->getMessage();
        }
    }
} elseif ($idModif > 0) {
    $donnees = SalleService::trouver($idModif) ?? [];
    if (!$donnees) {
        $idModif = 0;
    }
}

$recherche  = trim($_GET['recherche'] ?? '');
$equipement = trim($_GET['equipement'] ?? '');
$parPage    = 6;
$total      = SalleService::compter($recherche, $equipement);
$nbPages    = max(1, (int) ceil($total / $parPage));
$page       = min(max(1, (int) ($_GET['page'] ?? 1)), $nbPages);
$salles     = SalleService::lister($recherche, $equipement, $parPage, ($page - 1) * $parPage);

$totalSalles = SalleService::compter();
$debut       = $total > 0 ? ($page - 1) * $parPage + 1 : 0;
$fin         = min($total, $page * $parPage);

// Image de chaque carte, selon l'équipement (consultation par défaut)
$images = [
    'ECG'        => 'salle-ecg.jpeg',
    'Echographe' => 'salle-echographie.jpeg',
    'IRM'        => 'salle-irm.jpeg',
    'Radiologie' => 'salle-radiologie.jpeg',
    'Scanner'    => 'salle-scanner.jpeg',
];

$titrePage  = 'Gestion des salles';
$pageActive = 'gestion-salles';
$cssPage    = 'gestion-salles.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="conteneur page-salles">

    <section class="entete-page">
        <div>
            <span class="sur-titre">ADMINISTRATION</span>
            <h1>Gestion des salles</h1>
            <p>Consultez et gérez les différentes salles et installations de la clinique.</p>
        </div>

        <a href="#formulaire-salle" class="btn btn-principal">
            + Ajouter une salle
        </a>
    </section>

    <section class="resume-salles">
        <article class="resume-carte">
            <div class="resume-icone">🏥</div>
            <div>
                <p>Nombre total de salles</p>
                <h2><?= $totalSalles ?></h2>
            </div>
        </article>
    </section>

    <!-- Formulaire : ajout ou modification -->
    <section class="panneau" id="formulaire-salle" aria-labelledby="titre-formulaire" style="margin-bottom: 2rem;">
        <h2 id="titre-formulaire"><?= $idModif > 0 ? 'Modifier la salle' : 'Nouvelle salle' ?></h2>

        <?php if ($succes !== ''): ?>
            <div class="alerte alerte-succes" role="status"><?= e($succes) ?></div>
        <?php endif; ?>

        <?php if ($erreurSuppression !== ''): ?>
            <div class="alerte alerte-erreur" role="alert"><?= e($erreurSuppression) ?></div>
        <?php endif; ?>

        <?php if ($erreurs): ?>
            <div class="alerte alerte-erreur" role="alert">
                <ul>
                    <?php foreach ($erreurs as $erreur): ?>
                        <li><?= e($erreur) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form class="formulaire" action="gestion-salles.php" method="post">
            <?php if ($idModif > 0): ?>
                <input type="hidden" name="id_salle" value="<?= $idModif ?>">
            <?php endif; ?>

            <div class="formulaire-grille">
                <div class="champ">
                    <label for="salle_nom">Nom de la salle *</label>
                    <input type="text" id="salle_nom" name="salle_nom" maxlength="100" required
                           value="<?= e($donnees['salle_nom'] ?? '') ?>">
                </div>
                <div class="champ">
                    <label for="salle_equipement">Équipement</label>
                    <select id="salle_equipement" name="salle_equipement">
                        <option value="">Aucun équipement</option>
                        <?php foreach (SalleService::equipements() as $eq): ?>
                            <option value="<?= e($eq) ?>" <?= ($donnees['salle_equipement'] ?? '') === $eq ? 'selected' : '' ?>><?= e($eq) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="formulaire-actions">
                <button type="submit" class="btn btn-principal">
                    <?= $idModif > 0 ? 'Enregistrer les modifications' : 'Enregistrer la salle' ?>
                </button>
                <?php if ($idModif > 0): ?>
                    <a href="gestion-salles.php" class="btn btn-secondaire">Annuler</a>
                <?php endif; ?>
            </div>
        </form>
    </section>

    <section class="panneau section-salles">

        <div class="section-entete">
            <div>
                <h2>Liste des salles</h2>
                <p>Visualisez les équipements de chaque salle.</p>
            </div>
        </div>

        <form class="outils-salles" action="gestion-salles.php" method="get">
            <input type="search" name="recherche" placeholder="Rechercher une salle..."
                   aria-label="Rechercher une salle" value="<?= e($recherche) ?>">

            <select name="equipement" aria-label="Filtrer par équipement">
                <option value="">Tous les équipements</option>
                <?php foreach (SalleService::equipements() as $eq): ?>
                    <option value="<?= e($eq) ?>" <?= $eq === $equipement ? 'selected' : '' ?>><?= e($eq) ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="btn btn-secondaire">Filtrer</button>
        </form>

        <div class="grille-salles">

            <?php if (!$salles): ?>
                <p>Aucune salle trouvée.</p>
            <?php endif; ?>

            <?php foreach ($salles as $s): ?>
                <article class="carte-salle">
                    <div class="salle-image">
                        <img src="assets/img/<?= e($images[$s['salle_equipement'] ?? ''] ?? 'salle-consultation.jpeg') ?>"
                             alt="<?= e($s['salle_nom']) ?>">
                    </div>
                    <div class="salle-contenu">
                        <span class="salle-reference">SALLE <?= str_pad($s['id_salle'], 3, '0', STR_PAD_LEFT) ?></span>
                        <h3><?= e($s['salle_nom']) ?></h3>
                        <div class="salle-infos">
                            <span>Équipement : <?= e($s['salle_equipement'] ?? 'Aucun') ?></span>
                        </div>
                        <div class="salle-actions">
                            <a class="action-btn modifier" href="gestion-salles.php?modifier=<?= (int) $s['id_salle'] ?>#formulaire-salle">Modifier</a>

                            <form action="gestion-salles.php" method="post" style="display: inline;"
                                  onsubmit="return confirm('Supprimer cette salle ?');">
                                <input type="hidden" name="action" value="supprimer">
                                <input type="hidden" name="id_salle" value="<?= (int) $s['id_salle'] ?>">
                                <button type="submit" class="action-btn supprimer" aria-label="Supprimer <?= e($s['salle_nom']) ?>">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>

        </div>

        <div class="pagination">
            <span>Affichage de <?= $debut ?> à <?= $fin ?> salles sur <?= $total ?></span>
            <div>
                <form action="gestion-salles.php" method="get" style="display: contents;">
                    <input type="hidden" name="recherche" value="<?= e($recherche) ?>">
                    <input type="hidden" name="equipement" value="<?= e($equipement) ?>">
                    <button type="submit" name="page" value="<?= $page - 1 ?>" <?= $page <= 1 ? 'disabled' : '' ?>>Précédent</button>
                    <?php for ($n = max(1, $page - 2); $n <= min($nbPages, $page + 2); $n++): ?>
                        <button type="submit" name="page" value="<?= $n ?>" <?= $n === $page ? 'class="page-active"' : '' ?>><?= $n ?></button>
                    <?php endfor; ?>
                    <button type="submit" name="page" value="<?= $page + 1 ?>" <?= $page >= $nbPages ? 'disabled' : '' ?>>Suivant</button>
                </form>
            </div>
        </div>

    </section>

</main>

<?php require __DIR__ . '/../src/footer.php'; ?>