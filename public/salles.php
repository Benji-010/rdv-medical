<?php
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

        <!-- SALLE 1 -->
        <article class="carte-salle">

          <img src="assets/img/salle-consultation.jpeg"
               alt="Salle de consultation médicale"
               class="photo-salle">

          <div class="infos-salle">

            <span class="type-salle">Consultation</span>

            <h3>Salle de consultation générale</h3>

            <p>
              Un espace dédié aux consultations médicales,
              aux examens cliniques et au suivi des patients.
            </p>

            <div class="equipements">
              <strong>Équipements :</strong>
              <span>Table d'examen, tensiomètre, stéthoscope.</span>
            </div>

          </div>
        </article>

        <!-- SALLE 2 -->
        <article class="carte-salle">

          <img src="assets/img/salle-radiologie.jpeg"
               alt="Salle de radiologie"
               class="photo-salle">

          <div class="infos-salle">

            <span class="type-salle">Imagerie médicale</span>

            <h3>Salle de radiologie</h3>

            <p>
              Un espace équipé pour réaliser des examens
              radiologiques permettant d'observer différentes
              parties du corps.
            </p>

            <div class="equipements">
              <strong>Équipements :</strong>
              <span>Appareil de radiographie, écran de visualisation.</span>
            </div>

          </div>
        </article>

        <!-- SALLE 3 -->
        <article class="carte-salle">

          <img src="assets/img/salle-echographie.jpeg"
               alt="Salle d'échographie"
               class="photo-salle">

          <div class="infos-salle">

            <span class="type-salle">Imagerie médicale</span>

            <h3>Salle d'échographie</h3>

            <p>
              Un environnement adapté aux examens échographiques
              et à l'observation des organes internes.
            </p>

            <div class="equipements">
              <strong>Équipements :</strong>
              <span>Échographe, écran médical, table d'examen.</span>
            </div>

          </div>
        </article>

        <!-- SALLE 4 -->
        <article class="carte-salle">

          <img src="assets/img/salle-ecg.jpeg"
               alt="Salle d'électrocardiogramme"
               class="photo-salle">

          <div class="infos-salle">

            <span class="type-salle">Cardiologie</span>

            <h3>Salle d'ECG</h3>

            <p>
              Un espace consacré à l'enregistrement de l'activité
              électrique du cœur pour les examens cardiaques.
            </p>

            <div class="equipements">
              <strong>Équipements :</strong>
              <span>Électrocardiographe, électrodes, moniteur.</span>
            </div>

          </div>
        </article>

        <!-- SALLE 5 -->
        <article class="carte-salle">

          <img src="assets/img/salle-scanner.jpeg"
               alt="Salle de scanner médical"
               class="photo-salle">

          <div class="infos-salle">

            <span class="type-salle">Imagerie médicale</span>

            <h3>Salle de scanner</h3>

            <p>
              Un espace destiné aux examens par tomodensitométrie
              pour obtenir des images détaillées du corps.
            </p>

            <div class="equipements">
              <strong>Équipements :</strong>
              <span>Scanner médical, table motorisée, console.</span>
            </div>

          </div>
        </article>

        <!-- SALLE 6 -->
        <article class="carte-salle">

          <img src="assets/img/salle-irm.jpeg"
               alt="Salle d'imagerie par résonance magnétique"
               class="photo-salle">

          <div class="infos-salle">

            <span class="type-salle">Imagerie médicale</span>

            <h3>Salle d'IRM</h3>

            <p>
              Un espace spécialisé dans les examens par
              résonance magnétique pour obtenir des images
              précises des structures internes.
            </p>

            <div class="equipements">
              <strong>Équipements :</strong>
              <span>Appareil IRM, console de commande, moniteur.</span>
            </div>

          </div>
        </article>

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