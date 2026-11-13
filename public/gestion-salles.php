
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des salles | Clinique Santé Plus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/gestion-salles.css">
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
                <li><a href="gestion-medecins.php">Médecins</a></li>
                <li><a href="gestion-salles.php" aria-current="page">Salles</a></li>
                <li><a href="gestion-disponibilites.php">Disponibilités</a></li>
                <li><a href="patients.php">Patients</a></li>
                <li><a href="statistiques.php">Statistiques</a></li>
                <li><a href="liste-rendez-vous.php">Rendez-vous</a></li>
                <li><a href="logout.php" class="lien-deconnexion">Déconnexion</a></li>
            </ul>
        </nav>

        <button class="menu-bouton" aria-label="Ouvrir le menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<main class="conteneur page-salles">

    <section class="entete-page">
        <div>
            <span class="sur-titre">ADMINISTRATION</span>
            <h1>Gestion des salles</h1>
            <p>Consultez et gérez les différentes salles et installations de la clinique.</p>
        </div>

        <button type="button" class="btn btn-principal">
            + Ajouter une salle
        </button>
    </section>

    <section class="resume-salles">

        <article class="resume-carte">
            <div class="resume-icone">🏥</div>
            <div>
                <p>Nombre total de salles</p>
                <h2>06</h2>
            </div>
        </article>

        <article class="resume-carte">
            <div class="resume-icone disponible">✓</div>
            <div>
                <p>Salles disponibles</p>
                <h2>05</h2>
            </div>
        </article>

        <article class="resume-carte">
            <div class="resume-icone occupe">●</div>
            <div>
                <p>Salles occupées</p>
                <h2>01</h2>
            </div>
        </article>

    </section>

    <section class="panneau section-salles">

        <div class="section-entete">
            <div>
                <h2>Liste des salles</h2>
                <p>Visualisez les équipements et l'état de chaque salle.</p>
            </div>
        </div>

        <div class="outils-salles">
            <input type="search" placeholder="Rechercher une salle..." aria-label="Rechercher une salle">

            <select aria-label="Filtrer par type">
                <option value="">Tous les types</option>
                <option>Consultation</option>
                <option>Imagerie médicale</option>
                <option>Examen médical</option>
            </select>

            <select aria-label="Filtrer par disponibilité">
                <option value="">Tous les statuts</option>
                <option>Disponible</option>
                <option>Occupée</option>
                <option>Maintenance</option>
            </select>
        </div>

        <div class="grille-salles">

            <article class="carte-salle">
                <div class="salle-image">
                    <img src="assets/images/salle-consultation.jpg" alt="Salle de consultation générale">
                    <span class="statut-salle disponible">Disponible</span>
                </div>
                <div class="salle-contenu">
                    <span class="salle-reference">SALLE 001</span>
                    <h3>Consultation générale</h3>
                    <p>Destinée aux consultations médicales générales et au suivi des patients.</p>
                    <div class="salle-infos">
                        <span>Type : Consultation</span>
                        <span>Capacité : 3 personnes</span>
                    </div>
                    <div class="salle-actions">
                        <button type="button" class="action-btn voir">Voir</button>
                        <button type="button" class="action-btn modifier">Modifier</button>
                        <button type="button" class="action-btn supprimer">Supprimer</button>
                    </div>
                </div>
            </article>

            <article class="carte-salle">
                <div class="salle-image">
                    <img src="assets/images/salle-radiologie.jpg" alt="Salle de radiologie">
                    <span class="statut-salle disponible">Disponible</span>
                </div>
                <div class="salle-contenu">
                    <span class="salle-reference">SALLE 002</span>
                    <h3>Salle de radiologie</h3>
                    <p>Équipée pour réaliser des examens radiologiques et des prises de clichés.</p>
                    <div class="salle-infos">
                        <span>Type : Imagerie médicale</span>
                        <span>Capacité : 2 personnes</span>
                    </div>
                    <div class="salle-actions">
                        <button type="button" class="action-btn voir">Voir</button>
                        <button type="button" class="action-btn modifier">Modifier</button>
                        <button type="button" class="action-btn supprimer">Supprimer</button>
                    </div>
                </div>
            </article>

            <article class="carte-salle">
                <div class="salle-image">
                    <img src="assets/images/salle-echographie.jpg" alt="Salle d'échographie">
                    <span class="statut-salle occupe">Occupée</span>
                </div>
                <div class="salle-contenu">
                    <span class="salle-reference">SALLE 003</span>
                    <h3>Salle d'échographie</h3>
                    <p>Réservée aux examens échographiques et à l'imagerie par ultrasons.</p>
                    <div class="salle-infos">
                        <span>Type : Imagerie médicale</span>
                        <span>Capacité : 2 personnes</span>
                    </div>
                    <div class="salle-actions">
                        <button type="button" class="action-btn voir">Voir</button>
                        <button type="button" class="action-btn modifier">Modifier</button>
                        <button type="button" class="action-btn supprimer">Supprimer</button>
                    </div>
                </div>
            </article>

            <article class="carte-salle">
                <div class="salle-image">
                    <img src="assets/images/salle-ecg.jpg" alt="Salle d'électrocardiogramme">
                    <span class="statut-salle disponible">Disponible</span>
                </div>
                <div class="salle-contenu">
                    <span class="salle-reference">SALLE 004</span>
                    <h3>Salle ECG</h3>
                    <p>Utilisée pour les examens électrocardiographiques et le suivi cardiaque.</p>
                    <div class="salle-infos">
                        <span>Type : Examen médical</span>
                        <span>Capacité : 2 personnes</span>
                    </div>
                    <div class="salle-actions">
                        <button type="button" class="action-btn voir">Voir</button>
                        <button type="button" class="action-btn modifier">Modifier</button>
                        <button type="button" class="action-btn supprimer">Supprimer</button>
                    </div>
                </div>
            </article>

            <article class="carte-salle">
                <div class="salle-image">
                    <img src="assets/images/salle-scanner.jpg" alt="Salle de scanner">
                    <span class="statut-salle disponible">Disponible</span>
                </div>
                <div class="salle-contenu">
                    <span class="salle-reference">SALLE 005</span>
                    <h3>Salle de scanner</h3>
                    <p>Destinée aux examens d'imagerie médicale par tomodensitométrie.</p>
                    <div class="salle-infos">
                        <span>Type : Imagerie médicale</span>
                        <span>Capacité : 2 personnes</span>
                    </div>
                    <div class="salle-actions">
                        <button type="button" class="action-btn voir">Voir</button>
                        <button type="button" class="action-btn modifier">Modifier</button>
                        <button type="button" class="action-btn supprimer">Supprimer</button>
                    </div>
                </div>
            </article>

            <article class="carte-salle">
                <div class="salle-image">
                    <img src="assets/images/salle-irm.jpg" alt="Salle d'IRM">
                    <span class="statut-salle disponible">Disponible</span>
                </div>
                <div class="salle-contenu">
                    <span class="salle-reference">SALLE 006</span>
                    <h3>Salle d'IRM</h3>
                    <p>Équipée pour les examens par imagerie par résonance magnétique.</p>
                    <div class="salle-infos">
                        <span>Type : Imagerie médicale</span>
                        <span>Capacité : 2 personnes</span>
                    </div>
                    <div class="salle-actions">
                        <button type="button" class="action-btn voir">Voir</button>
                        <button type="button" class="action-btn modifier">Modifier</button>
                        <button type="button" class="action-btn supprimer">Supprimer</button>
                    </div>
                </div>
            </article>

        </div>

        <div class="pagination">
            <span>Affichage de 1 à 6 salles sur 6</span>
            <div>
                <button type="button" disabled>Précédent</button>
                <button type="button" class="page-active">1</button>
                <button type="button" disabled>Suivant</button>
            </div>
        </div>

    </section>

    <section class="note-administration">
        <span>ℹ️</span>
        <p>Les informations présentées sont des données de démonstration. Les fonctionnalités d'ajout, de modification et de suppression seront activées lors de l'intégration du backend.</p>
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
