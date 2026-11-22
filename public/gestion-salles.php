<?php
require_once __DIR__ . '/../src/Auth.php';

// Si personne n'est connecté, renvoie vers login.php
Auth::exigerConnexion();

$titrePage  = 'Gestion des salles';
$pageActive = 'gestion-salles';
$cssPage    = 'gestion-salles.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="conteneur page-salles">

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
                <img src="assets/img/salle-consultation.jpeg" alt="Salle de consultation générale">    
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
                    <img src="assets/img/salle-radiologie.jpeg" alt="Salle de radiologie">
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
                    <img src="assets/img/salle-echographie.jpeg" alt="Salle d'échographie">
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
                    <img src="assets/img/salle-ecg.jpeg" alt="Salle d'électrocardiogramme">
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
                    <img src="assets/img/salle-scanner.jpeg" alt="Salle de scanner">
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
                    <img src="assets/img/salle-irm.jpeg" alt="Salle d'IRM">
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

<?php require __DIR__ . '/../src/footer.php'; ?>