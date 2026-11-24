<?php
require_once __DIR__ . '/../src/MedecinService.php';

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$medecins       = MedecinService::lister('', '', 1000);
$photoParDefaut = 'assets/img/medecins/defaut.jpeg';

$titrePage  = 'Nos médecins';
$pageActive = 'medecins';
$cssPage    = 'medecins.css';
require __DIR__ . '/../src/header.php';
?>

  <main id="contenu">

    <!-- INTRODUCTION -->
    <section class="intro-medecins">
      <div class="conteneur">

        <p class="surtitre">NOTRE ÉQUIPE MÉDICALE</p>

        <h1>Découvrez nos médecins</h1>

        <p class="texte">
          Notre équipe est composée de professionnels qualifiés
          et expérimentés, engagés à vous offrir des soins de
          qualité et un accompagnement adapté à vos besoins.
        </p>

      </div>
    </section>

    <!-- LISTE DES MÉDECINS -->
    <section class="conteneur section-medecins">

      <div class="section-titre">
        <div>
          <h2>Une équipe à votre écoute</h2>
          <p class="texte-doux">
            Découvrez les spécialistes de notre établissement.
          </p>
        </div>
      </div>

      <div class="grille-medecins">

        <?php if (!$medecins): ?>
          <p class="texte-doux">Aucun médecin n'est enregistré pour le moment.</p>
        <?php endif; ?>

        <?php foreach ($medecins as $m): ?>
          <?php $nomComplet = $m['medecin_prenom'] . ' ' . $m['medecin_nom'] . ' ' . $m['medecin_postnom']; ?>
          <article class="carte-medecin">

            <img src="<?= e($m['medecin_photo'] ?? $photoParDefaut) ?>"
                 alt="Portrait du docteur <?= e($nomComplet) ?>"
                 class="photo-medecin">

            <div class="infos-medecin">
              <span class="specialite"><?= e($m['medecin_specialite']) ?></span>
              <h3>Dr <?= e($nomComplet) ?></h3>
            </div>

          </article>
        <?php endforeach; ?>

      </div>
    </section>

    <!-- APPEL À L'ACTION -->
    <section class="conteneur appel-medecins">

      <div>
        <h2>Besoin d'une consultation ?</h2>

        <p>
          Prenez rendez-vous avec l'un de nos médecins
          et bénéficiez d'un accompagnement adapté.
        </p>
      </div>

      <a href="demande-rendez-vous.php" class="btn btn-principal">
        Prendre rendez-vous
      </a>

    </section>

  </main>

<?php require __DIR__ . '/../src/footer.php'; ?>