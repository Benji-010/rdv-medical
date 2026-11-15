
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prendre rendez-vous | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/demande-rendez-vous.css">
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
            <a href="disponibilites.php" aria-current="">
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


    <main>

        <!-- Introduction -->
        <section class="intro-rendez-vous">
            <div class="conteneur">
                <span class="surtitre">Votre santé, notre priorité</span>

                <h1>Demande de rendez-vous</h1>

                <p>
                    Remplissez le formulaire ci-dessous pour effectuer une
                    demande de consultation auprès de l'un de nos médecins.
                </p>
            </div>
        </section>


        <!-- Formulaire -->
        <section class="section-rendez-vous">
            <div class="conteneur">

                <div class="formulaire-conteneur">

                    <div class="formulaire-entete">
                        <h2>Informations du patient</h2>
                        <p>Les champs marqués d'un astérisque (*) sont obligatoires.</p>
                    </div>

                    <form class="formulaire-rendez-vous" action="" method="POST">

                        <div class="groupe-champs">

                            <div class="champ-rendez-vous">
                                <label for="nom">Nom *</label>
                                <input
                                    type="text"
                                    id="nom"
                                    name="nom"
                                    placeholder="Votre nom"
                                    required
                                >
                            </div>

                            <div class="champ-rendez-vous">
                                <label for="prenom">Prénom *</label>
                                <input
                                    type="text"
                                    id="prenom"
                                    name="prenom"
                                    placeholder="Votre prénom"
                                    required
                                >
                            </div>

                            <div class="champ-rendez-vous">
                                <label for="email">Adresse e-mail *</label>
                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="exemple@email.com"
                                    required
                                >
                            </div>

                            <div class="champ-rendez-vous">
                                <label for="telephone">Téléphone *</label>
                                <input
                                    type="tel"
                                    id="telephone"
                                    name="telephone"
                                    placeholder="+243 ..."
                                    required
                                >
                            </div>

                            <div class="champ-rendez-vous champ-complet">
                                <label for="medecin">Médecin souhaité *</label>

                                <select id="medecin" name="medecin" required>
                                    <option value="">Choisissez un médecin</option>
                                    <option value="jean-kabeya">Dr Jean Kabeya — Cardiologie</option>
                                    <option value="marie-ilunga">Dr Marie Ilunga — Pédiatrie</option>
                                    <option value="patrick-mbuyi">Dr Patrick Mbuyi — Médecine générale</option>
                                    <option value="sarah-nsimba">Dr Sarah Nsimba — Radiologie</option>
                                </select>
                            </div>

                            <div class="champ-rendez-vous">
                                <label for="date">Date souhaitée *</label>
                                <input
                                    type="date"
                                    id="date"
                                    name="date_rendez_vous"
                                    required
                                >
                            </div>

                            <div class="champ-rendez-vous">
                                <label for="heure">Heure souhaitée *</label>

                                <select id="heure" name="heure_rendez_vous" required>
                                    <option value="">Choisissez une heure</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                </select>
                            </div>

                            <div class="champ-rendez-vous champ-complet">
                                <label for="motif">Motif de la consultation</label>
                                <textarea
                                    id="motif"
                                    name="motif"
                                    rows="5"
                                    placeholder="Indiquez brièvement le motif général de votre demande..."
                                ></textarea>
                            </div>

                        </div>

                        <!-- <p class="avertissement-formulaire">
                            Cette page est une maquette de démonstration.
                            N'indiquez aucune information médicale confidentielle.
                            L'envoi réel des demandes sera ajouté ultérieurement.
                        </p> -->

                        <div class="actions-formulaire">
                            <button type="reset" class="btn btn-secondaire">
                                Réinitialiser
                            </button>

                            <button type="submit" class="btn btn-principal">
                                Envoyer la demande
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </section>


        <!-- Informations complémentaires -->
        <section class="info-rendez-vous">
            <div class="conteneur info-rendez-vous-interieur">

                <div>
                    <h2>Besoin d'informations ?</h2>
                    <p>
                        Notre équipe est disponible pour vous renseigner
                        sur les consultations et les horaires.
                    </p>
                </div>

                <a href="disponibilites.php" class="btn btn-secondaire">
                    Voir les disponibilités
                </a>

            </div>
        </section>

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
