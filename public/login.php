
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

    <!-- En-tête -->
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
            <a href="disponibilites.php">
              Disponibilités
            </a>
          </li>

          <li class="menu-action">
            <a class="btn btn-principal" href="demande-rendez-vous.php">
              Prendre rendez-vous
            </a>
          </li>

          <li><a href="login.php" aria-current="page">Connexion</a></li>
        </ul>

      </nav>
    </div>
  </header>


    <main class="page-connexion">

        <div class="conteneur connexion-conteneur">

            <!-- Illustration / Présentation -->
            <section class="connexion-presentation">

                <div class="presentation-contenu">

                    <span class="presentation-surtitre">
                        Espace sécurisé
                    </span>

                    <h1>Bienvenue dans votre espace personnel</h1>

                    <p>
                        Connectez-vous pour accéder à votre espace et
                        retrouver les informations liées à votre compte
                        sur Clinique Santé Plus.
                    </p>

                    <div class="presentation-avantage">
                        <div class="avantage-icone">✓</div>
                        <div>
                            <h3>Un espace personnel</h3>
                            <p>Retrouvez vos informations en un seul endroit.</p>
                        </div>
                    </div>

                    <div class="presentation-avantage">
                        <div class="avantage-icone">✓</div>
                        <div>
                            <h3>Un accès simplifié</h3>
                            <p>Profitez d'une interface simple et pratique.</p>
                        </div>
                    </div>

                </div>

                <div class="presentation-decoration decoration-1"></div>
                <div class="presentation-decoration decoration-2"></div>

            </section>


            <!-- Formulaire de connexion -->
            <section class="connexion-formulaire">

                <div class="connexion-carte">

                    <div class="connexion-logo">
                        <span class="connexion-logo-icone">+</span>
                    </div>

                    <div class="connexion-titre">
                        <h2>Connexion</h2>
                        <p>Accédez à votre compte personnel.</p>
                    </div>

                    <form action="" method="POST">

                        <div class="champ-connexion">
                            <label for="identifiant">Adresse e-mail ou identifiant</label>
                            <input
                                type="text"
                                id="identifiant"
                                name="identifiant"
                                placeholder="Saisissez votre identifiant"
                                required
                            >
                        </div>

                        <div class="champ-connexion">
                            <div class="label-mot-de-passe">
                                <label for="mot_de_passe">Mot de passe</label>
                                <a href="#">Mot de passe oublié ?</a>
                            </div>

                            <input
                                type="password"
                                id="mot_de_passe"
                                name="mot_de_passe"
                                placeholder="Saisissez votre mot de passe"
                                required
                            >
                        </div>

                        <div class="options-connexion">
                            <label class="souvenir-compte">
                                <input type="checkbox" name="se_souvenir">
                                <span>Se souvenir de moi</span>
                            </label>
                        </div>

                        <button type="submit" class="btn btn-principal bouton-connexion">
                            Se connecter
                        </button>

                    </form>

                    <div class="connexion-separation">
                        <span>ou</span>
                    </div>

                <div class="acces-admin">
                <span class="acces-admin-icone">🔒</span>
                <p>
                <strong>Accès réservé à l'administration</strong>
                <span>
                Cet espace est exclusivement destiné à l'administrateur
                de la Clinique Santé Plus.
                </span>
                </p>
                </div>

                </div>

                <p class="connexion-retour">
                    <a href="index.php">← Retour à l'accueil</a>
                </p>

            </section>

        </div>

    </main>


    <!-- Pied de page -->
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
