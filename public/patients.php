
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patients | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/patients.css">
</head>
<body>

<header class="entete">
    <div class="conteneur entete-interieur">
       
    <a class="logo" href="tableau-de-bord.php">
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

         <nav class="menu" id="menu-principal">
                <ul class="menu-liste">
                    <li><a href="tableau-de-bord.php">Tableau de bord</a></li>
                    <li><a href="gestion-medecins.php">Médecins</a></li>
                    <li><a href="gestion-salles.php">Salles</a></li>
                    <li><a href="gestion-disponibilites.php">Disponibilités</a></li>
                    <li><a href="patients.php" aria-current="page">Patients</a></li>
                    <li><a href="statistiques.php">Statistiques</a></li>
                    <li><a href="liste-rendez-vous.php">Rendez-vous</a></li>
                    <li><a href="#" class="lien-deconnexion">Déconnexion</a></li>
                </ul>
            </nav>

            <button class="menu-bouton" type="button"
              aria-expanded="false" aria-controls="menu-principal">
        Menu
      </button>
    </div>
</header>


<main class="administration">
    <div class="conteneur">

        <section class="entete-page-admin">
            <div>
                <span class="surtitre-admin">Gestion administrative</span>
                <h1>Gestion des patients</h1>
                <p>Consultez et gérez les informations des patients de la clinique.</p>
            </div>

            <button type="button" class="btn btn-principal">
                + Ajouter un patient
            </button>
        </section>


        <section class="patients-resume">
            <article class="resume-patient">
                <span class="resume-patient-icone">♙</span>
                <div>
                    <p>Total des patients</p>
                    <h2>128</h2>
                </div>
            </article>

            <article class="resume-patient">
                <span class="resume-patient-icone resume-bleu">✚</span>
                <div>
                    <p>Nouveaux patients</p>
                    <h2>12</h2>
                </div>
            </article>

            <article class="resume-patient">
                <span class="resume-patient-icone resume-vert">▣</span>
                <div>
                    <p>Patients avec rendez-vous</p>
                    <h2>36</h2>
                </div>
            </article>
        </section>


        <section class="section-liste-patients">

            <div class="titre-section-admin">
                <div>
                    <h2>Liste des patients</h2>
                    <p>Retrouvez les patients enregistrés dans la clinique.</p>
                </div>
            </div>

            <div class="outils-patients">
                <div class="recherche-patient">
                    <span>⌕</span>
                    <input type="search" placeholder="Rechercher un patient...">
                </div>

                <select aria-label="Filtrer les patients">
                    <option value="">Tous les patients</option>
                    <option value="recent">Récemment inscrits</option>
                    <option value="anciens">Anciens patients</option>
                </select>
            </div>


            <div class="panneau tableau-patients">
                <div class="tableau-defilant">
                    <table>
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Identifiant</th>
                                <th>Téléphone</th>
                                <th>E-mail</th>
                                <th>Date d'inscription</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-patient">MK</span>
                                        <strong>Marie Kanku</strong>
                                    </div>
                                </td>
                                <td>PAT-001</td>
                                <td>+243 810 000 001</td>
                                <td>marie.k@email.com</td>
                                <td>05/11/2026</td>
                                <td><span class="statut-patient actif">Actif</span></td>
                                <td><a href="#" class="action-patient">Détails</a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-patient avatar-bleu">PL</span>
                                        <strong>Paul Lukusa</strong>
                                    </div>
                                </td>
                                <td>PAT-002</td>
                                <td>+243 820 000 002</td>
                                <td>paul.l@email.com</td>
                                <td>06/11/2026</td>
                                <td><span class="statut-patient actif">Actif</span></td>
                                <td><a href="#" class="action-patient">Détails</a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-patient avatar-orange">AN</span>
                                        <strong>Alice Nsimba</strong>
                                    </div>
                                </td>
                                <td>PAT-003</td>
                                <td>+243 830 000 003</td>
                                <td>alice.n@email.com</td>
                                <td>07/11/2026</td>
                                <td><span class="statut-patient actif">Actif</span></td>
                                <td><a href="#" class="action-patient">Détails</a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-patient avatar-violet">JM</span>
                                        <strong>Jean Mbuyi</strong>
                                    </div>
                                </td>
                                <td>PAT-004</td>
                                <td>+243 840 000 004</td>
                                <td>jean.m@email.com</td>
                                <td>08/11/2026</td>
                                <td><span class="statut-patient inactif">Inactif</span></td>
                                <td><a href="#" class="action-patient">Détails</a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-patient avatar-rose">CN</span>
                                        <strong>Carine Nlandu</strong>
                                    </div>
                                </td>
                                <td>PAT-005</td>
                                <td>+243 850 000 005</td>
                                <td>carine.n@email.com</td>
                                <td>09/11/2026</td>
                                <td><span class="statut-patient actif">Actif</span></td>
                                <td><a href="#" class="action-patient">Détails</a></td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-patient avatar-vert">BK</span>
                                        <strong>Bernard Kabeya</strong>
                                    </div>
                                </td>
                                <td>PAT-006</td>
                                <td>+243 860 000 006</td>
                                <td>bernard.k@email.com</td>
                                <td>10/11/2026</td>
                                <td><span class="statut-patient actif">Actif</span></td>
                                <td><a href="#" class="action-patient">Détails</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-patients">
                    <span>Affichage de 1 à 6 sur 128 patients</span>
                    <div>
                        <button type="button" disabled>Précédent</button>
                        <button type="button" class="page-active">1</button>
                        <button type="button">2</button>
                        <button type="button">3</button>
                        <button type="button">Suivant</button>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main>


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
          <li><a href="tableau-de-bord.php">Tableau de bord</a></li>
          <li><a href="gestion-medecins.php">Médecins</a></li>
          <li><a href="gestion-salles.php">Salles</a></li>
          <li><a href="gestion-disponibilites.php">Disponibilités</a></li>
          <li><a href="patients.php">Patients</a></li>
          <li><a href="statistiques.php">Statistiques</a></li>
          <li><a href="liste-rendez-vous.php">Rendez-vous</a></li>
          <li><a href="logout.php">Déconnexion</a></li>
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
