<?php
require_once __DIR__ . '/../src/SalleService.php';

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$salles = SalleService::lister('', '', 1000);

// Image de chaque carte, selon l'équipement (consultation par défaut)
$images = [
    'ECG'        => 'salle-ecg.jpeg',
    'Echographe' => 'salle-echographie.jpeg',
    'IRM'        => 'salle-irm.jpeg',
    'Radiologie' => 'salle-radiologie.jpeg',
    'Scanner'    => 'salle-scanner.jpeg',
];

$titrePage  = 'Nos salles';
$pageActive = 'salles';
$cssPage    = 'salles.css';
require __DIR__ . '/../src/header.php';
?>

  <main id="contenu">

    <!-- INTRODUCTION -->
    <section class="intro-salles">
      <div class="conteneur">

        <p class="surtitre">NOS INSTALLATIONS</p>

        <h1>Découvrez nos salles</h1>

        <p class="texte">
          La Clinique Santé Plus dispose d'espaces modernes et
          équipés pour assurer la réalisation de vos consultations
          et examens médicaux dans les meilleures conditions.
        </p>

      </div>
    </section>

    <!-- LISTE DES SALLES -->
    <section class="conteneur section-salles">

      <div class="section-titre">
        <h2>Nos espaces médicaux</h2>

        <p class="texte-doux">
          Des installations adaptées à différents besoins médicaux.
        </p>
      </div>

      <div class="grille-salles">

        <?php if (!$salles): ?>
          <p class="texte-doux">Aucune salle n'est enregistrée pour le moment.</p>
        <?php endif; ?>

        <?php foreach ($salles as $s): ?>
          <article class="carte-salle">

            <img src="assets/img/<?= e($images[$s['salle_equipement'] ?? ''] ?? 'salle-consultation.jpeg') ?>"
                 alt="<?= e($s['salle_nom']) ?>"
                 class="photo-salle">

            <div class="infos-salle">

              <h3><?= e($s['salle_nom']) ?></h3>

              <div class="equipements">
                <strong>Équipement :</strong>
                <span><?= e($s['salle_equipement'] ?? 'Aucun équipement spécifique') ?></span>
              </div>

            </div>
          </article>
        <?php endforeach; ?>

      </div>
    </section>

    <!-- INFORMATION -->
    <section class="conteneur info-salles">

      <div class="info-icone">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="12" cy="12" r="9"/>
          <path d="M12 11v5M12 8h.01"/>
        </svg>
      </div>

      <div>
        <h2>Des espaces adaptés à vos besoins</h2>

        <p>
          Nos salles sont organisées pour accueillir les patients
          dans un environnement propre, confortable et adapté
          aux différents examens médicaux.
        </p>
      </div>

    </section>

  </main>

<?php require __DIR__ . '/../src/footer.php'; ?>