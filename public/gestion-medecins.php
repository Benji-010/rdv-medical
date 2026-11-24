<?php
require_once __DIR__ . '/../src/Auth.php';
require_once __DIR__ . '/../src/MedecinService.php';

Auth::exigerConnexion();

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$erreurs = [];
$donnees = [];                             
$idModif = (int) ($_GET['modifier'] ?? 0);   

// Messages mémorisés juste avant la redirection (affichés une seule fois).
$succes = $_SESSION['succes'] ?? '';
$erreurSuppression = $_SESSION['erreur'] ?? '';
unset($_SESSION['succes'], $_SESSION['erreur']);

// ---- Traitement des formulaires ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Cas 1 : clic sur « Supprimer »
    if (($_POST['action'] ?? '') === 'supprimer') {
        try {
            MedecinService::supprimer((int) ($_POST['id_medecin'] ?? 0));
            $_SESSION['succes'] = 'Le médecin a été supprimé.';
        } catch (RuntimeException $ex) {
            $_SESSION['erreur'] = $ex->getMessage();
        }
        header('Location: gestion-medecins.php');
        exit;
    }

    // Cas 2 : ajout ou modification
    $donnees = $_POST;
    $idModif = (int) ($_POST['id_medecin'] ?? 0);
    $fichier = $_FILES['medecin_photo'] ?? null;

    // Validation côté serveur : la liste est vide si tout est correct.
    $erreurs = MedecinService::valider($donnees, $fichier);

    if (!$erreurs) {
        try {
            if ($idModif > 0) {
                MedecinService::modifier($idModif, $donnees, $fichier);
                $_SESSION['succes'] = 'Le médecin a été modifié.';
            } else {
                MedecinService::ajouter($donnees, $fichier);
                $_SESSION['succes'] = 'Le médecin a été enregistré.';
            }
            // Redirection : évite de renvoyer le formulaire si on actualise la page.
            header('Location: gestion-medecins.php');
            exit;
        } catch (RuntimeException $ex) {
            $erreurs[] = $ex->getMessage();
        }
    }
} elseif ($idModif > 0) {
    // Clic sur « Modifier » : on remplit le formulaire avec le médecin choisi.
    $donnees = MedecinService::trouver($idModif) ?? [];
    if (!$donnees) {
        $idModif = 0; // médecin introuvable : on repasse en mode ajout
    }
}

// ---- Liste, recherche, filtre et pagination ----
$recherche  = trim($_GET['recherche'] ?? '');
$specialite = trim($_GET['specialite'] ?? '');
$parPage    = 10;
$total      = MedecinService::compter($recherche, $specialite);
$nbPages    = max(1, (int) ceil($total / $parPage));
$page       = min(max(1, (int) ($_GET['page'] ?? 1)), $nbPages);
$medecins   = MedecinService::lister($recherche, $specialite, $parPage, ($page - 1) * $parPage);

$specialites   = MedecinService::specialites();
$totalMedecins = MedecinService::compter();
$debut         = $total > 0 ? ($page - 1) * $parPage + 1 : 0;
$fin           = min($total, $page * $parPage);

$photoParDefaut = 'assets/img/medecins/defaut.jpeg';

$titrePage  = 'Gestion des médecins';
$pageActive = 'gestion-medecins';
$cssPage    = 'gestion-medecins.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="conteneur page-medecins">

  <section class="entete-page">
    <div>
      <span class="sur-titre">ADMINISTRATION</span>
      <h1>Gestion des médecins</h1>
      <p>Consultez et gérez les informations des médecins de la clinique.</p>
    </div>

    <a href="#formulaire-medecin" class="btn btn-principal">
      + Ajouter un médecin
    </a>
  </section>

  <section class="resume-medecins">
    <article class="resume-carte">
      <span class="resume-icone">👨‍⚕️</span>
      <div>
        <p class="resume-label">Total des médecins</p>
        <h2><?= $totalMedecins ?></h2>
      </div>
    </article>

    <article class="resume-carte">
      <span class="resume-icone">＋</span>
      <div>
        <p class="resume-label">Spécialités représentées</p>
        <h2><?= count($specialites) ?></h2>
      </div>
    </article>
  </section>

  <!-- Formulaire : ajout ou modification -->
  <section class="panneau" id="formulaire-medecin" aria-labelledby="titre-formulaire" style="margin-bottom: 2rem;">
    <h2 id="titre-formulaire"><?= $idModif > 0 ? 'Modifier le médecin' : 'Nouveau médecin' ?></h2>

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

    <!-- enctype="multipart/form-data" est OBLIGATOIRE pour envoyer un fichier -->
    <form class="formulaire" action="gestion-medecins.php" method="post" enctype="multipart/form-data">
      <?php if ($idModif > 0): ?>
        <input type="hidden" name="id_medecin" value="<?= $idModif ?>">
      <?php endif; ?>

      <div class="formulaire-grille">
        <div class="champ">
          <label for="medecin_nom">Nom *</label>
          <input type="text" id="medecin_nom" name="medecin_nom" maxlength="100" required
                 value="<?= e($donnees['medecin_nom'] ?? '') ?>">
        </div>
        <div class="champ">
          <label for="medecin_postnom">Postnom *</label>
          <input type="text" id="medecin_postnom" name="medecin_postnom" maxlength="100" required
                 value="<?= e($donnees['medecin_postnom'] ?? '') ?>">
        </div>
        <div class="champ">
          <label for="medecin_prenom">Prénom *</label>
          <input type="text" id="medecin_prenom" name="medecin_prenom" maxlength="100" required
                 value="<?= e($donnees['medecin_prenom'] ?? '') ?>">
        </div>
        <div class="champ">
          <label for="medecin_specialite">Spécialité *</label>
          <!-- list="..." propose les spécialités déjà utilisées, mais on peut en saisir une nouvelle -->
          <input type="text" id="medecin_specialite" name="medecin_specialite" maxlength="100" required
                 list="liste-specialites" value="<?= e($donnees['medecin_specialite'] ?? '') ?>">
          <datalist id="liste-specialites">
            <?php foreach ($specialites as $s): ?>
              <option value="<?= e($s) ?>">
            <?php endforeach; ?>
          </datalist>
        </div>
        <div class="champ">
          <label for="medecin_photo">Photo (JPEG, PNG ou WebP, 2 Mo maximum)</label>
          <input type="file" id="medecin_photo" name="medecin_photo" accept="image/jpeg,image/png,image/webp">
          <?php if ($idModif > 0): ?>
            <small>Laissez vide pour conserver la photo actuelle.</small>
          <?php endif; ?>
        </div>
      </div>

      <div class="formulaire-actions">
        <button type="submit" class="btn btn-principal">
          <?= $idModif > 0 ? 'Enregistrer les modifications' : 'Enregistrer le médecin' ?>
        </button>
        <?php if ($idModif > 0): ?>
          <a href="gestion-medecins.php" class="btn btn-secondaire">Annuler</a>
        <?php endif; ?>
      </div>
    </form>
  </section>

  <section class="panneau section-liste">
    <div class="section-entete">
      <div>
        <h2>Liste des médecins</h2>
        <p>Retrouvez ici les médecins enregistrés dans la clinique.</p>
      </div>
    </div>

    <form class="outils-liste" action="gestion-medecins.php" method="get">
      <div class="recherche-medecin">
        <input type="search" name="recherche" placeholder="Rechercher un médecin..."
               aria-label="Rechercher un médecin" value="<?= e($recherche) ?>">
      </div>

      <select name="specialite" aria-label="Filtrer par spécialité">
        <option value="">Toutes les spécialités</option>
        <?php foreach ($specialites as $s): ?>
          <option value="<?= e($s) ?>" <?= $s === $specialite ? 'selected' : '' ?>><?= e($s) ?></option>
        <?php endforeach; ?>
      </select>

      <button type="submit" class="btn btn-secondaire">Filtrer</button>
    </form>

    <div class="tableau-defilant">
      <table class="tableau">
        <thead>
          <tr>
            <th>Médecin</th>
            <th>Spécialité</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <?php if (!$medecins): ?>
            <tr><td colspan="3">Aucun médecin trouvé.</td></tr>
          <?php endif; ?>

          <?php foreach ($medecins as $m): ?>
            <?php $nomComplet = $m['medecin_prenom'] . ' ' . $m['medecin_nom'] . ' ' . $m['medecin_postnom']; ?>
            <tr>
              <td>
                <div class="medecin-identite">
                  <img src="<?= e($m['medecin_photo'] ?? $photoParDefaut) ?>" alt="Photo de <?= e($nomComplet) ?>">
                  <strong>Dr <?= e($nomComplet) ?></strong>
                </div>
              </td>
              <td><?= e($m['medecin_specialite']) ?></td>
              <td>
                <div class="actions">
                  <a class="action-btn modifier" href="gestion-medecins.php?modifier=<?= (int) $m['id_medecin'] ?>#formulaire-medecin">Modifier</a>

                  <!-- La suppression passe par un formulaire POST, avec confirmation -->
                  <form action="gestion-medecins.php" method="post" style="display: inline;"
                        onsubmit="return confirm('Supprimer ce médecin ?');">
                    <input type="hidden" name="action" value="supprimer">
                    <input type="hidden" name="id_medecin" value="<?= (int) $m['id_medecin'] ?>">
                    <button class="action-btn supprimer" type="submit" aria-label="Supprimer <?= e($nomComplet) ?>">Supprimer</button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="pagination">
      <span>Affichage de <?= $debut ?> à <?= $fin ?> médecins sur <?= $total ?></span>
      <div>
        <!-- display: contents : le formulaire n'ajoute pas de bloc, les boutons gardent leur style -->
        <form action="gestion-medecins.php" method="get" style="display: contents;">
          <input type="hidden" name="recherche" value="<?= e($recherche) ?>">
          <input type="hidden" name="specialite" value="<?= e($specialite) ?>">
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