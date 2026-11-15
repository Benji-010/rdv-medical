
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Nos médecins | Clinique Santé Plus</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/medecins.css">
</head>

<body>

  <a class="lien-evitement" href="#contenu">
    Aller au contenu
  </a>

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

          <li>
            <a href="medecins.php" aria-current="page">
              Médecins
            </a>
          </li>

          <li><a href="salles.php">Salles</a></li>

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

        <!-- MÉDECIN 1 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-1.jpeg"
               alt="Portrait du docteur Jean Kabeya"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Cardiologie</span>

            <h3>Dr Jean Kabeya</h3>

            <p>
              Spécialiste des maladies cardiovasculaires,
              il assure le suivi et la prévention des
              maladies du cœur.
            </p>

          </div>
        </article>

        <!-- MÉDECIN 2 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-2.jpeg"
               alt="Portrait de la docteure Marie Ilunga"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Pédiatrie</span>

            <h3>Dr Marie Ilunga</h3>

            <p>
              Spécialisée dans la santé des enfants,
              elle accompagne les familles dans le suivi
              médical et le développement des petits.
            </p>

          </div>
        </article>

        <!-- MÉDECIN 3 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-3.jpeg"
               alt="Portrait du docteur Patrick Mbuyi"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Médecine générale</span>

            <h3>Dr Patrick Mbuyi</h3>

            <p>
              Il assure les consultations générales,
              les diagnostics et le suivi médical
              des patients.
            </p>

          </div>
        </article>

        <!-- MÉDECIN 4 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-4.jpeg"
               alt="Portrait de la docteure Sarah Nsimba"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Radiologie</span>

            <h3>Dr Sarah Nsimba</h3>

            <p>
              Spécialisée en imagerie médicale,
              elle réalise et interprète les examens
              radiologiques.
            </p>

          </div>
        </article>

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
          <li><a href="demande-rendez-vous.php">Prendre rendez-vous</a></li>
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
