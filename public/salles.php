
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Nos salles | Clinique Santé Plus</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/salles.css">
</head>

<body>

  <a class="lien-evitement" href="#contenu">Aller au contenu</a>

  <!-- EN-TÊTE -->
  <header class="entete">
    <div class="conteneur entete-interieur">

      <a class="logo" href="index.php">
        <svg viewBox="0 0 32 32" aria-hidden="true">
          <rect width="32" height="32" rx="8" fill="#1f6feb"/>
          <path d="M5 17h6l3-7 4 13 3-8 2 2h4"
                fill="none" stroke="#fff" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span class="logo-texte">
          <strong>Clinique Santé Plus</strong>
          <small>Votre santé, notre priorité</small>
        </span>
      </a>

      <button class="menu-bouton" type="button"
              aria-expanded="false" aria-controls="menu-principal">
        Menu
      </button>

      <nav class="menu" id="menu-principal"
           aria-label="Navigation principale">

        <ul class="menu-liste">
          <li><a href="index.php">Accueil</a></li>
          <li><a href="medecins.php">Médecins</a></li>

          <li>
            <a href="salles.php" aria-current="page">Salles</a>
          </li>

          <li><a href="disponibilites.php">Disponibilités</a></li>

          <li class="menu-action">
            <a class="btn btn-principal" href="demande-rendez-vous.php">
              Prendre rendez-vous
            </a>
          </li>

          <li><a href="login.php">Connexion</a></li>
        </ul>

      </nav>
    </div>
  </header>

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

          <img src="assets/img/salle-consultation.jpg"
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

          <img src="assets/img/salle-radiologie.jpg"
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

          <img src="assets/img/salle-echographie.jpg"
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

          <img src="assets/img/salle-ecg.jpg"
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

          <img src="assets/img/salle-scanner.jpg"
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

          <img src="assets/img/salle-irm.jpg"
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

  <!-- PIED DE PAGE -->
  <footer class="pied">

    <div class="conteneur pied-grille">

      <div class="pied-marque">

        <svg viewBox="0 0 32 32" aria-hidden="true">
          <rect width="32" height="32" rx="8" fill="#1f6feb"/>
          <path d="M5 17h6l3-7 4 13 3-8 2 2h4"
                fill="none" stroke="#fff" stroke-width="2.2"
                stroke-linecap="round" stroke-linejoin="round"/>
        </svg>

        <span>
          Clinique Santé Plus
          <small>Votre santé, notre priorité</small>
        </span>

      </div>

      <div>
        <h2>Nous contacter</h2>

        <ul>
          <li>Avenue de la Santé 12, Kinshasa, RDC</li>
          <li>+243 000 000 000</li>
          <li>contact@cliniquesanteplus.cd</li>
        </ul>
      </div>

      <nav class="pied-liens" aria-label="Liens rapides">

        <h2>Liens rapides</h2>

        <ul>
          <li><a href="index.php">Accueil</a></li>
          <li><a href="medecins.php">Médecins</a></li>
          <li><a href="salles.php">Salles</a></li>
          <li><a href="disponibilites.php">Disponibilités</a></li>
          <li><a href="login.php">Connexion</a></li>
        </ul>

      </nav>

    </div>

    <p class="pied-copyright">
      © 2026 Clinique Santé Plus. Projet de Programmation Web 2,
      Université Catholique du Congo.
    </p>

  </footer>

  <script src="assets/js/main.js"></script>

</body>
</html>
