<?php
// Vérifie la session en cours
require_once __DIR__ . '/../src/Auth.php';

// Si personne n'est connecté, renvoie vers login.php
Auth::exigerConnexion();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tableau de bord | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tableau-de-bord.css">
</head>

<body>

    <!-- En-tête de l'administration -->
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
                    <li><a href="tableau-de-bord.php" aria-current="page">Tableau de bord</a></li>
                    <li><a href="gestion-medecins.php">Médecins</a></li>
                    <li><a href="gestion-salles.php">Salles</a></li>
                    <li><a href="gestion-disponibilites.php">Disponibilités</a></li>
                    <li><a href="patients.php">Patients</a></li>
                    <li><a href="statistiques.php">Statistiques</a></li>
                    <li><a href="liste-rendez-vous.php">Rendez-vous</a></li>
                    <li><a href="logout.php" class="lien-deconnexion">Déconnexion</a></li>
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

            <!-- Bienvenue -->
            <section class="bienvenue-admin">
                <div>
                    <span class="surtitre-admin">Espace administration</span>
                    <h1>Bienvenue, Administrateur !</h1>
                    <p>
                        Voici un aperçu de l'activité de votre clinique.
                        Gérez vos patients, vos médecins et vos rendez-vous
                        depuis cet espace.
                    </p>
                </div>

                <a href="liste-rendez-vous.php" class="btn btn-principal">
                    Voir les rendez-vous
                </a>
            </section>


            <!-- Indicateurs -->
            <section class="section-indicateurs">

                <div class="titre-section-admin">
                    <div>
                        <h2>Vue d'ensemble</h2>
                        <p>Quelques indicateurs de votre clinique</p>
                    </div>
                </div>

                <div class="grille-indicateurs">

                    <article class="carte-indicateur">
                        <div class="indicateur-haut">
                            <span class="indicateur-icone icone-patients">♙</span>
                            <span class="indicateur-evolution">Total</span>
                        </div>

                        <p class="indicateur-libelle">Patients enregistrés</p>
                        <h3>128</h3>
                        <a href="patients.php">Voir les patients →</a>
                    </article>


                    <article class="carte-indicateur">
                        <div class="indicateur-haut">
                            <span class="indicateur-icone icone-medecins">✚</span>
                            <span class="indicateur-evolution">Actifs</span>
                        </div>

                        <p class="indicateur-libelle">Médecins</p>
                        <h3>12</h3>
                        <a href="gestion-medecins.php">Voir les médecins →</a>
                    </article>


                    <article class="carte-indicateur">
                        <div class="indicateur-haut">
                            <span class="indicateur-icone icone-rendez-vous">▣</span>
                            <span class="indicateur-evolution">Aujourd'hui</span>
                        </div>

                        <p class="indicateur-libelle">Rendez-vous</p>
                        <h3>18</h3>
                        <a href="liste-rendez-vous.php">Voir les rendez-vous →</a>
                    </article>


                    <article class="carte-indicateur">
                        <div class="indicateur-haut">
                            <span class="indicateur-icone icone-attente">◷</span>
                            <span class="indicateur-evolution">À traiter</span>
                        </div>

                        <p class="indicateur-libelle">Demandes en attente</p>
                        <h3>05</h3>
                        <a href="liste-rendez-vous.php">Consulter les demandes →</a>
                    </article>

                </div>

            </section>


            <!-- Rendez-vous récents -->
            <section class="section-activite">

                <div class="titre-section-admin">
                    <div>
                        <h2>Rendez-vous récents</h2>
                        <p>Les dernières demandes de consultation</p>
                    </div>

                    <a href="liste-rendez-vous.php" class="lien-section">
                        Voir tout →
                    </a>
                </div>


                <div class="panneau tableau-admin">

                    <div class="tableau-defilant">
                        <table>
                            <thead>
                                <tr>
                                    <th>Patient</th>
                                    <th>Médecin</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Statut</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <div class="patient-tableau">
                                            <span class="avatar-patient">MK</span>
                                            <span>Marie Kanku</span>
                                        </div>
                                    </td>
                                    <td>Dr Jean Kabeya</td>
                                    <td>12/11/2026</td>
                                    <td>09:00</td>
                                    <td><span class="badge badge-en-attente">En attente</span></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="patient-tableau">
                                            <span class="avatar-patient avatar-2">PL</span>
                                            <span>Paul Lukusa</span>
                                        </div>
                                    </td>
                                    <td>Dr Patrick Mbuyi</td>
                                    <td>12/11/2026</td>
                                    <td>10:00</td>
                                    <td><span class="badge badge-confirme">Confirmé</span></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="patient-tableau">
                                            <span class="avatar-patient avatar-3">AN</span>
                                            <span>Alice Nsimba</span>
                                        </div>
                                    </td>
                                    <td>Dr Marie Ilunga</td>
                                    <td>13/11/2026</td>
                                    <td>08:00</td>
                                    <td><span class="badge badge-confirme">Confirmé</span></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="patient-tableau">
                                            <span class="avatar-patient avatar-4">JM</span>
                                            <span>Jean Mbuyi</span>
                                        </div>
                                    </td>
                                    <td>Dr Sarah Nsimba</td>
                                    <td>13/11/2026</td>
                                    <td>11:00</td>
                                    <td><span class="badge badge-en-attente">En attente</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </section>


            <!-- Raccourcis -->
            <section class="section-raccourcis">

                <div class="titre-section-admin">
                    <div>
                        <h2>Accès rapide</h2>
                        <p>Accédez directement aux différentes fonctionnalités</p>
                    </div>
                </div>


                <div class="grille-raccourcis">

                    <a href="patients.php" class="carte-raccourci">
                        <span class="raccourci-icone">♙</span>
                        <div>
                            <h3>Gestion des patients</h3>
                            <p>Consulter et gérer les patients enregistrés.</p>
                        </div>
                        <span class="raccourci-fleche">→</span>
                    </a>


                    <a href="statistiques.php" class="carte-raccourci">
                        <span class="raccourci-icone raccourci-violet">▥</span>
                        <div>
                            <h3>Statistiques</h3>
                            <p>Consulter les données et l'activité de la clinique.</p>
                        </div>
                        <span class="raccourci-fleche">→</span>
                    </a>


                    <a href="liste-rendez-vous.php" class="carte-raccourci">
                        <span class="raccourci-icone raccourci-orange">▣</span>
                        <div>
                            <h3>Liste des rendez-vous</h3>
                            <p>Consulter et suivre les demandes de rendez-vous.</p>
                        </div>
                        <span class="raccourci-fleche">→</span>
                    </a>


                    <a href="gestion-medecins.php" class="carte-raccourci">
                        <span class="raccourci-icone raccourci-vert">✚</span>
                        <div>
                            <h3>Gestion des médecins</h3>
                            <p>Consulter les informations des médecins.</p>
                        </div>
                        <span class="raccourci-fleche">→</span>
                    </a>

                </div>

            </section>


            <!-- Note informative -->
            <div class="note-administration">
                <span class="note-icone">ℹ</span>
                <p>
                    <strong>Espace administrateur :</strong>
                    les informations affichées sur ce tableau de bord
                    sont des données fictives utilisées pour la présentation
                    du projet.
                </p>
            </div>

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
