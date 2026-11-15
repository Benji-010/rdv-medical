
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Disponibilités | Clinique Santé Plus</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/disponibilites.css">
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
          <li><a href="medecins.php">Médecins</a></li>
          <li><a href="salles.php">Salles</a></li>

          <li>
            <a href="disponibilites.php" aria-current="page">
              Disponibilités
            </a>
          </li>

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

    <!-- TABLEAU DES DISPONIBILITES -->
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
              <th scope="col">Jours de consultation</th>
              <th scope="col">Horaires</th>
              <th scope="col">Statut</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>
                <strong>Dr Jean Kabeya</strong>
              </td>
              <td>Cardiologie</td>
              <td>Lundi, Mercredi, Vendredi</td>
              <td>08:00 - 14:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Dr Marie Ilunga</strong>
              </td>
              <td>Pédiatrie</td>
              <td>Mardi, Jeudi, Samedi</td>
              <td>08:00 - 12:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Dr Patrick Mbuyi</strong>
              </td>
              <td>Médecine générale</td>
              <td>Lundi au Vendredi</td>
              <td>09:00 - 17:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Dr Sarah Nsimba</strong>
              </td>
              <td>Radiologie</td>
              <td>Mardi, Mercredi, Vendredi</td>
              <td>08:00 - 15:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

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
