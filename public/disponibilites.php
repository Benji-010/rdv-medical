<?php
require_once __DIR__ . '/../src/MedecinService.php';
require_once __DIR__ . '/../src/DisponibiliteService.php';

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$aujourdhui = date('Y-m-d');
$inactifs   = ['Inactif', 'Fermée'];

// Garde les horaires actifs et encore valables
$valables = fn(array $lignes) => array_values(array_filter(
    $lignes,
    fn($l) => !in_array($l['statut'], $inactifs, true) && $l['valide_au'] >= $aujourdhui
));

$specialites = [];
foreach (MedecinService::lister('', '', 1000) as $m) {
    $specialites[$m['id_medecin']] = $m['medecin_specialite'];
}

$horairesMedecins = $valables(DisponibiliteService::horaires('medecin'));
$horairesSalles   = $valables(DisponibiliteService::horaires('salle'));
$hm               = fn(string $heure) => substr($heure, 0, 5);

$titrePage  = 'Disponibilités';
$pageActive = 'disponibilites';
$cssPage    = 'disponibilites.css';
require __DIR__ . '/../src/header.php';
?>

  <main id="contenu">

    <!-- INTRODUCTION -->
    <section class="intro-disponibilites">
      <div class="conteneur">

        <p class="surtitre">ORGANISEZ VOTRE VISITE</p>

        <h1>Disponibilités des médecins</h1>

        <p class="texte">
          Consultez les jours et horaires de consultation
          de nos médecins afin de choisir le moment qui
          vous convient le mieux.
        </p>

      </div>
    </section>

    <!-- HORAIRES GENERAUX -->
    <section class="conteneur resume-horaires">

      <div class="resume-icone">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="12" cy="12" r="9"/>
          <path d="M12 7v5l3 2"/>
        </svg>
      </div>

      <div class="resume-infos">
        <h2>Horaires de la clinique</h2>
        <p>
          <strong>Lundi au vendredi :</strong> 08:00 à 17:00
        </p>
        <p>
          <strong>Samedi :</strong> 08:00 à 12:00
        </p>
        <p>
          <strong>Dimanche :</strong> Fermé
        </p>
      </div>

    </section>

    <!-- HORAIRES DES MÉDECINS -->
    <section class="conteneur section-disponibilites">

      <div class="section-titre">
        <h2>Planning des consultations</h2>

        <p class="texte-doux">
          Retrouvez les horaires habituels de nos spécialistes.
        </p>
      </div>

      <div class="tableau-defilant">

        <table class="tableau-disponibilites">

          <thead>
            <tr>
              <th scope="col">Médecin</th>
              <th scope="col">Spécialité</th>
              <th scope="col">Jour de consultation</th>
              <th scope="col">Horaires</th>
            </tr>
          </thead>

          <tbody>

            <?php if (!$horairesMedecins): ?>
              <tr><td colspan="4">Aucun horaire n'est enregistré pour le moment.</td></tr>
            <?php endif; ?>

            <?php foreach ($horairesMedecins as $h): ?>
              <tr>
                <td><strong>Dr <?= e($h['nom']) ?></strong></td>
                <td><?= e($specialites[$h['id_cible']] ?? '') ?></td>
                <td><?= e($h['jour']) ?></td>
                <td><?= $hm($h['heure_debut']) ?> - <?= $hm($h['heure_fin']) ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>

        </table>

      </div>

      <p class="note-tableau">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="12" cy="12" r="9"/>
          <path d="M12 11v5M12 8h.01"/>
        </svg>

        Les horaires indiqués sont donnés à titre indicatif.
        Veuillez effectuer une demande de rendez-vous pour
        confirmer la disponibilité du médecin.
      </p>

    </section>

    <!-- HORAIRES DES SALLES -->
    <section class="conteneur section-disponibilites">

      <div class="section-titre">
        <h2>Ouverture des salles</h2>

        <p class="texte-doux">
          Les salles où se déroulent les consultations et les examens.
        </p>
      </div>

      <div class="tableau-defilant">

        <table class="tableau-disponibilites">

          <thead>
            <tr>
              <th scope="col">Salle</th>
              <th scope="col">Jour d'ouverture</th>
              <th scope="col">Horaires</th>
            </tr>
          </thead>

          <tbody>

            <?php if (!$horairesSalles): ?>
              <tr><td colspan="3">Aucun horaire n'est enregistré pour le moment.</td></tr>
            <?php endif; ?>

            <?php foreach ($horairesSalles as $h): ?>
              <tr>
                <td><strong><?= e($h['nom']) ?></strong></td>
                <td><?= e($h['jour']) ?></td>
                <td><?= $hm($h['heure_debut']) ?> - <?= $hm($h['heure_fin']) ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>

        </table>

      </div>

    </section>

    <!-- APPEL A L'ACTION -->
    <section class="conteneur appel-disponibilites">

      <div>
        <h2>Vous avez trouvé un horaire qui vous convient ?</h2>

        <p>
          Effectuez une demande de rendez-vous en quelques clics.
        </p>
      </div>

      <a href="demande-rendez-vous.php" class="btn btn-principal">
        Prendre rendez-vous
      </a>

    </section>

  </main>

<?php require __DIR__ . '/../src/footer.php'; ?>