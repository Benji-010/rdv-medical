<?php
require_once __DIR__ . '/../src/Auth.php';

// Si personne n'est connecté, renvoie vers login.php
Auth::exigerConnexion();

$titrePage  = 'Patients';
$pageActive = 'patients';
$cssPage    = 'patients.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="administration">
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

<?php require __DIR__ . '/../src/footer.php'; ?>