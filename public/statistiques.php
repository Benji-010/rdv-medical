
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistiques | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/statistiques.css">
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
      
        <nav class="menu">
            <ul class="menu-liste">
                <li><a href="tableau-de-bord.php">Tableau de bord</a></li>
                <li><a href="#.php">Médecins</a></li>
                <li><a href="#.php">Salles</a></li>
                <li><a href="#.php">Disponibilités</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="statistiques.php" aria-current="page">Statistiques</a></li>
                <li><a href="liste-rendez-vous.php">Rendez-vous</a></li>
                <li><a href="#.php" class="lien-deconnexion">Déconnexion</a></li>
            </ul>
        </nav>

        <button class="menu-bouton" aria-label="Ouvrir le menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>


<main class="administration">
    <div class="conteneur">

        <section class="entete-page-admin">
            <div>
                <span class="surtitre-admin">Analyse de l'activité</span>
                <h1>Statistiques de la clinique</h1>
                <p>Suivez les performances et l'évolution de l'activité de votre clinique.</p>
            </div>

            <select class="periode-statistiques" aria-label="Période des statistiques">
                <option>Cette année</option>
                <option>Ce mois</option>
                <option>Cette semaine</option>
            </select>
        </section>


        <!-- Indicateurs -->
        <section class="statistiques-indicateurs">

            <article class="statistique-carte">
                <div class="statistique-carte-haut">
                    <span class="statistique-icone bleu">♙</span>
                    <span class="statistique-label">Patients</span>
                </div>
                <h2>128</h2>
                <p>Total des patients enregistrés</p>
                <span class="statistique-evolution">+12 ce mois</span>
            </article>

            <article class="statistique-carte">
                <div class="statistique-carte-haut">
                    <span class="statistique-icone vert">▣</span>
                    <span class="statistique-label">Rendez-vous</span>
                </div>
                <h2>246</h2>
                <p>Total des rendez-vous</p>
                <span class="statistique-evolution">+18 cette semaine</span>
            </article>

            <article class="statistique-carte">
                <div class="statistique-carte-haut">
                    <span class="statistique-icone orange">◷</span>
                    <span class="statistique-label">En attente</span>
                </div>
                <h2>05</h2>
                <p>Demandes à traiter</p>
                <span class="statistique-attention">À examiner</span>
            </article>

            <article class="statistique-carte">
                <div class="statistique-carte-haut">
                    <span class="statistique-icone violet">✚</span>
                    <span class="statistique-label">Médecins</span>
                </div>
                <h2>12</h2>
                <p>Médecins actifs</p>
                <span class="statistique-evolution">Équipe médicale</span>
            </article>

        </section>


        <!-- Graphiques -->
        <section class="section-graphiques">

            <div class="graphique-carte graphique-evolution">
                <div class="graphique-entete">
                    <div>
                        <h2>Évolution des rendez-vous</h2>
                        <p>Nombre de rendez-vous par mois</p>
                    </div>
                    <span class="legende-graphique">
                        <span></span> Rendez-vous
                    </span>
                </div>

                <div class="graphique-barres">
                    <div class="axe-graphique">
                        <span>100</span>
                        <span>75</span>
                        <span>50</span>
                        <span>25</span>
                        <span>0</span>
                    </div>

                    <div class="zone-barres">
                        <div class="ligne-guide"><span></span></div>
                        <div class="ligne-guide"><span></span></div>
                        <div class="ligne-guide"><span></span></div>
                        <div class="ligne-guide"><span></span></div>
                        <div class="ligne-guide"><span></span></div>

                        <div class="colonnes">
                            <div class="colonne-groupe">
                                <div class="colonne" style="height: 35%;"></div>
                                <span>Juin</span>
                            </div>
                            <div class="colonne-groupe">
                                <div class="colonne" style="height: 48%;"></div>
                                <span>Juil.</span>
                            </div>
                            <div class="colonne-groupe">
                                <div class="colonne" style="height: 42%;"></div>
                                <span>Août</span>
                            </div>
                            <div class="colonne-groupe">
                                <div class="colonne" style="height: 62%;"></div>
                                <span>Sept.</span>
                            </div>
                            <div class="colonne-groupe">
                                <div class="colonne" style="height: 75%;"></div>
                                <span>Oct.</span>
                            </div>
                            <div class="colonne-groupe">
                                <div class="colonne" style="height: 90%;"></div>
                                <span>Nov.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="graphique-carte graphique-repartition">
                <div class="graphique-entete">
                    <div>
                        <h2>État des rendez-vous</h2>
                        <p>Répartition des demandes</p>
                    </div>
                </div>

                <div class="repartition-visuel">
                    <div class="anneau-statistique">
                        <div>
                            <strong>246</strong>
                            <span>Total</span>
                        </div>
                    </div>
                </div>

                <div class="legende-repartition">
                    <div>
                        <span class="pastille pastille-confirme"></span>
                        <span>Confirmés</span>
                        <strong>168</strong>
                    </div>
                    <div>
                        <span class="pastille pastille-attente"></span>
                        <span>En attente</span>
                        <strong>48</strong>
                    </div>
                    <div>
                        <span class="pastille pastille-annule"></span>
                        <span>Annulés</span>
                        <strong>30</strong>
                    </div>
                </div>
            </div>

        </section>


        <!-- Activité médicale -->
        <section class="section-activite-medicale">

            <div class="titre-section-admin">
                <div>
                    <h2>Activité des médecins</h2>
                    <p>Nombre de rendez-vous par médecin</p>
                </div>
            </div>

            <div class="tableau-statistiques">
                <div class="tableau-defilant">
                    <table>
                        <thead>
                            <tr>
                                <th>Médecin</th>
                                <th>Spécialité</th>
                                <th>Rendez-vous</th>
                                <th>Activité</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Dr Jean Kabeya</td>
                                <td>Cardiologie</td>
                                <td>58</td>
                                <td>
                                    <div class="barre-activite">
                                        <span style="width: 90%;"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Dr Marie Ilunga</td>
                                <td>Pédiatrie</td>
                                <td>46</td>
                                <td>
                                    <div class="barre-activite">
                                        <span style="width: 72%;"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Dr Patrick Mbuyi</td>
                                <td>Médecine générale</td>
                                <td>72</td>
                                <td>
                                    <div class="barre-activite">
                                        <span style="width: 100%;"></span>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>Dr Sarah Nsimba</td>
                                <td>Radiologie</td>
                                <td>35</td>
                                <td>
                                    <div class="barre-activite">
                                        <span style="width: 55%;"></span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>


        <div class="note-administration">
            <span class="note-icone">ℹ</span>
            <p>
                <strong>À savoir :</strong>
                toutes les données et représentations graphiques de cette page
                sont fictives et servent uniquement à illustrer le tableau
                de statistiques de la clinique.
            </p>
        </div>

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
          <li><a href="index.php">Accueil</a></li>
          <li><a href="tableau-de-bord.php">Tableau de bord</a></li>
          <li><a href="medecins.php">Médecins</a></li>
          <li><a href="salles.php">Salles</a></li>
          <li><a href="disponibilites.php">Disponibilités</a></li>
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
