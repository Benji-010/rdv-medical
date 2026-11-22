<?php
require_once __DIR__ . '/../src/Auth.php';

// Si personne n'est connecté, renvoie vers login.php
Auth::exigerConnexion();

$titrePage  = 'Tableau de bord';
$pageActive = 'tableau-de-bord';
$cssPage    = 'tableau-de-bord.css';
require __DIR__ . '/../src/header.php';
?>

    <main id="contenu" class="administration">

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

<?php require __DIR__ . '/../src/footer.php'; ?>