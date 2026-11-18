
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des disponibilités | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/gestion-disponibilites.css">
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
                    <li><a href="gestion-medecins.php" >Médecins</a></li>
                    <li><a href="gestion-salles.php">Salles</a></li>
                    <li><a href="gestion-disponibilites.php" aria-current="page">Disponibilités</a></li>
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

<main class="conteneur page-disponibilites">

    <section class="entete-page">
        <div>
            <span class="sur-titre">ADMINISTRATION</span>
            <h1>Gestion des disponibilités</h1>
            <p>Organisez les horaires de travail et les créneaux disponibles des médecins.</p>
        </div>

        <button type="button" class="btn btn-principal">
            + Ajouter un créneau
        </button>
    </section>

    <section class="resume-disponibilites">

        <article class="resume-carte">
            <div class="resume-icone">🕒</div>
            <div>
                <p>Créneaux enregistrés</p>
                <h2>24</h2>
            </div>
        </article>

        <article class="resume-carte">
            <div class="resume-icone disponible">✓</div>
            <div>
                <p>Créneaux disponibles</p>
                <h2>18</h2>
            </div>
        </article>

        <article class="resume-carte">
            <div class="resume-icone occupe">●</div>
            <div>
                <p>Créneaux occupés</p>
                <h2>06</h2>
            </div>
        </article>

    </section>

    <section class="panneau horaires-clinique">

        <div class="section-entete">
            <div>
                <h2>Horaires généraux de la clinique</h2>
                <p>Définissez les heures d'ouverture de l'établissement.</p>
            </div>

            <button type="button" class="btn btn-secondaire">
                Modifier les horaires
            </button>
        </div>

        <div class="tableau-defilant">
            <table class="tableau">
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Heure d'ouverture</th>
                        <th>Heure de fermeture</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td><span class="badge badge-succes">Ouvert</span></td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td><span class="badge badge-succes">Ouvert</span></td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td><span class="badge badge-succes">Ouvert</span></td>
                    </tr>
                    <tr>
                        <td>Jeudi</td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td><span class="badge badge-succes">Ouvert</span></td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>08:00</td>
                        <td>17:00</td>
                        <td><span class="badge badge-succes">Ouvert</span></td>
                    </tr>
                    <tr>
                        <td>Samedi</td>
                        <td>08:00</td>
                        <td>12:00</td>
                        <td><span class="badge badge-succes">Ouvert</span></td>
                    </tr>
                    <tr>
                        <td>Dimanche</td>
                        <td>—</td>
                        <td>—</td>
                        <td><span class="badge badge-danger">Fermé</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </section>

    <section class="panneau section-medecins">

        <div class="section-entete">
            <div>
                <h2>Disponibilités des médecins</h2>
                <p>Consultez les horaires de consultation de chaque médecin.</p>
            </div>
        </div>

        <div class="outils-disponibilites">
            <input type="search" placeholder="Rechercher un médecin..." aria-label="Rechercher un médecin">

            <select aria-label="Filtrer par jour">
                <option value="">Tous les jours</option>
                <option>Lundi</option>
                <option>Mardi</option>
                <option>Mercredi</option>
                <option>Jeudi</option>
                <option>Vendredi</option>
                <option>Samedi</option>
            </select>

            <select aria-label="Filtrer par statut">
                <option value="">Tous les statuts</option>
                <option>Disponible</option>
                <option>Indisponible</option>
            </select>
        </div>

        <div class="tableau-defilant">
            <table class="tableau">
                <thead>
                    <tr>
                        <th>Médecin</th>
                        <th>Spécialité</th>
                        <th>Jours de consultation</th>
                        <th>Horaires</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><strong>Dr Jean Kabeya</strong></td>
                        <td>Cardiologie</td>
                        <td>Lun. / Mer. / Ven.</td>
                        <td>08:00 – 14:00</td>
                        <td><span class="badge badge-succes">Disponible</span></td>
                        <td>
                            <div class="actions">
                                <button type="button" class="action-btn modifier">Modifier</button>
                                <button type="button" class="action-btn supprimer">Supprimer</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Dr Marie Ilunga</strong></td>
                        <td>Pédiatrie</td>
                        <td>Mar. / Jeu. / Sam.</td>
                        <td>08:00 – 12:00</td>
                        <td><span class="badge badge-succes">Disponible</span></td>
                        <td>
                            <div class="actions">
                                <button type="button" class="action-btn modifier">Modifier</button>
                                <button type="button" class="action-btn supprimer">Supprimer</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Dr Patrick Mbuyi</strong></td>
                        <td>Médecine générale</td>
                        <td>Lun. au Ven.</td>
                        <td>09:00 – 17:00</td>
                        <td><span class="badge badge-succes">Disponible</span></td>
                        <td>
                            <div class="actions">
                                <button type="button" class="action-btn modifier">Modifier</button>
                                <button type="button" class="action-btn supprimer">Supprimer</button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Dr Sarah Nsimba</strong></td>
                        <td>Radiologie</td>
                        <td>Mar. / Mer. / Ven.</td>
                        <td>08:00 – 15:00</td>
                        <td><span class="badge badge-succes">Disponible</span></td>
                        <td>
                            <div class="actions">
                                <button type="button" class="action-btn modifier">Modifier</button>
                                <button type="button" class="action-btn supprimer">Supprimer</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <span>Affichage de 1 à 4 médecins sur 4</span>
            <div>
                <button type="button" disabled>Précédent</button>
                <button type="button" class="page-active">1</button>
                <button type="button" disabled>Suivant</button>
            </div>
        </div>

    </section>

    <section class="note-administration">
        <span>ℹ️</span>
        <p>Les horaires et les disponibilités présentés sont des données de démonstration. Leur gestion effective sera mise en place lors de l'intégration du backend et de la base de données.</p>
    </section>

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
