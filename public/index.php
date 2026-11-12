<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accueil | Clinique Santé Plus</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/accueil.css">
</head>
<body>
  <a class="lien-evitement" href="#contenu">Aller au contenu</a>

  <header class="entete">
    <div class="conteneur entete-interieur">
      <a class="logo" href="index.php">
        <svg viewBox="0 0 32 32" aria-hidden="true">
          <rect width="32" height="32" rx="8" fill="#1f6feb"/>
          <path d="M5 17h6l3-7 4 13 3-8 2 2h4" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span class="logo-texte"><strong>Clinique Santé Plus</strong><small>Votre santé, notre priorité</small></span>
      </a>
      <button class="menu-bouton" type="button" aria-expanded="false" aria-controls="menu-principal">Menu</button>
      <nav class="menu" id="menu-principal" aria-label="Navigation principale">
        <ul class="menu-liste">
          <li><a href="index.php" aria-current="page">Accueil</a></li>
          <li><a href="medecins.php">Médecins</a></li>
          <li><a href="salles.php">Salles</a></li>
          <li><a href="disponibilites.php">Disponibilités</a></li>
          <li class="menu-action"><a class="btn btn-principal" href="demande-rendez-vous.php">Prendre rendez-vous</a></li>
          <li><a href="login.php">Connexion</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="contenu">

    <section class="hero">
      <div class="conteneur hero-grille">
        <div>
          <h1>Prenez rendez-vous en quelques clics</h1>
          <p class="texte">Notre clinique vous offre un accès rapide et simple à des soins de qualité, avec des médecins spécialisés et des équipements modernes.</p>
          <a class="btn btn-principal btn-icone" href="demande-rendez-vous.php">
            <svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg>
            Prendre rendez-vous
          </a>
        </div>
        <img class="hero-image" src="assets/img/accueil.jpg" alt="Médecin accueillant une patiente à la clinique" width="640" height="480">
      </div>
    </section>

    <section class="conteneur bloc apropos" aria-labelledby="titre-apropos">
      <div>
        <h2 id="titre-apropos">À propos de la clinique</h2>
        <p class="texte">La Clinique Santé Plus est un établissement de santé moderne qui met à votre disposition une équipe de professionnels qualifiés et des équipements de pointe pour vous offrir des soins de qualité, dans un cadre agréable et sécurisé.</p>
        <p class="engagement">
          <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3l8 3v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6z"/><path d="M8.5 12l2.5 2.5 4.5-5"/></svg>
          Votre santé est notre engagement
        </p>
      </div>
      <img class="apropos-image" src="assets/img/clinique.jpg" alt="Façade de la Clinique Santé Plus" width="640" height="400">
    </section>

    <section class="conteneur bloc" aria-labelledby="titre-services">
      <h2 id="titre-services">Des services complets pour votre santé</h2>
      <ul class="services">
        <li>
          <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 3v5a4 4 0 0 0 8 0V3"/><path d="M10 12v3a5 5 0 0 0 10 0v-1.5"/><circle cx="20" cy="11" r="2"/></svg></span>
          <h3>Consultation générale</h3>
          <p>Suivi médical pour vous et votre famille.</p>
        </li>
        <li>
          <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M12 7v10M9 9h6M9.5 12.5h5M10 16h4"/></svg></span>
          <h3>Radiologie</h3>
          <p>Imagerie médicale de haute précision.</p>
        </li>
        <li>
          <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="7" cy="17" r="1.5"/><path d="M11 17a4 4 0 0 0-4-4M15 17a8 8 0 0 0-8-8M19 17A12 12 0 0 0 7 5"/></svg></span>
          <h3>Échographie</h3>
          <p>Des images fiables pour un meilleur diagnostic.</p>
        </li>
        <li>
          <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20s-7-4.5-7-10a4 4 0 0 1 7-2.5A4 4 0 0 1 19 10c0 5.5-7 10-7 10z"/><path d="M7 12h3l1.5-3 2 5 1.5-2H17"/></svg></span>
          <h3>ECG</h3>
          <p>Analyse rapide de votre activité cardiaque.</p>
        </li>
        <li>
          <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3.5"/></svg></span>
          <h3>Scanner</h3>
          <p>Des examens précis pour un diagnostic complet.</p>
        </li>
        <li>
          <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="6" width="18" height="12" rx="3"/><circle cx="12" cy="12" r="3.5"/><path d="M3 21h18"/></svg></span>
          <h3>IRM</h3>
          <p>Une technologie avancée pour des résultats fiables.</p>
        </li>
      </ul>
    </section>

    <section class="conteneur bloc deux-colonnes">
      <div class="panneau">
        <h2>Horaires d'ouverture</h2>
        <dl class="horaires-liste">
          <div><dt>Lundi au vendredi</dt><dd>08:00 à 17:00</dd></div>
          <div><dt>Samedi</dt><dd>08:00 à 12:00</dd></div>
          <div><dt>Dimanche</dt><dd>Fermé</dd></div>
        </dl>
      </div>
      <div class="panneau">
        <h2>Pourquoi nous choisir</h2>
        <ul class="avantages">
          <li>
            <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg></span>
            <div><h3>Rendez-vous en ligne</h3><p>Gagnez du temps avec une demande de rendez-vous simple et rapide.</p></div>
          </li>
          <li>
            <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21c1-4 4-6 8-6s7 2 8 6"/></svg></span>
            <div><h3>Médecins spécialisés</h3><p>Une équipe de médecins dans plusieurs spécialités, à votre écoute.</p></div>
          </li>
          <li>
            <span class="icone-rond"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3" y="4" width="18" height="13" rx="2"/><path d="M12 8v5M9.5 10.5h5M8 21h8"/></svg></span>
            <div><h3>Salles équipées</h3><p>Chaque examen se fait dans une salle dotée du bon équipement.</p></div>
          </li>
        </ul>
      </div>
    </section>

  </main>

  <footer class="pied">
    <div class="conteneur pied-grille">
      <div class="pied-marque">
        <svg viewBox="0 0 32 32" aria-hidden="true">
          <rect width="32" height="32" rx="8" fill="#1f6feb"/>
          <path d="M5 17h6l3-7 4 13 3-8 2 2h4" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <span>Clinique Santé Plus<small>Votre santé, notre priorité</small></span>
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
    <p class="pied-copyright">© 2026 Clinique Santé Plus. Projet de Programmation Web 2, Université Catholique du Congo.</p>
  </footer>

  <script src="assets/js/main.js"></script>
</body>
</html>