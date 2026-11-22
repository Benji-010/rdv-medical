<?php
require_once __DIR__ . '/../src/Auth.php';

// Si personne n'est connecté, renvoie vers login.php
Auth::exigerConnexion();

$titrePage  = 'Liste des rendez-vous';
$pageActive = 'rendez-vous';
$cssPage    = 'liste-rendez-vous.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="administration">
    <div class="conteneur">

        <!-- Introduction -->
        <section class="entete-page-admin">
            <div>
                <span class="surtitre-admin">Gestion des consultations</span>
                <h1>Liste des rendez-vous</h1>
                <p>Consultez les demandes et suivez les rendez-vous de la clinique.</p>
            </div>

            <a href="demande-rendez-vous.php" class="btn btn-principal">
                + Nouveau rendez-vous
            </a>
        </section>


        <!-- Résumé -->
        <section class="resume-rendez-vous">

            <article class="carte-resume-rdv">
                <div class="resume-rdv-icone bleu">▣</div>
                <div>
                    <p>Total des rendez-vous</p>
                    <h2>246</h2>
                </div>
            </article>

            <article class="carte-resume-rdv">
                <div class="resume-rdv-icone orange">◷</div>
                <div>
                    <p>En attente</p>
                    <h2>48</h2>
                </div>
            </article>

            <article class="carte-resume-rdv">
                <div class="resume-rdv-icone vert">✓</div>
                <div>
                    <p>Confirmés</p>
                    <h2>168</h2>
                </div>
            </article>

            <article class="carte-resume-rdv">
                <div class="resume-rdv-icone rouge">×</div>
                <div>
                    <p>Annulés</p>
                    <h2>30</h2>
                </div>
            </article>

        </section>


        <!-- Filtres -->
        <section class="section-liste-rdv">

            <div class="titre-section-admin">
                <div>
                    <h2>Tous les rendez-vous</h2>
                    <p>Consultez les demandes et leurs informations.</p>
                </div>
            </div>

            <div class="filtres-rdv">

                <div class="recherche-rdv">
                    <span>⌕</span>
                    <input type="search" placeholder="Rechercher un patient ou un médecin...">
                </div>

                <select aria-label="Filtrer par statut">
                    <option value="">Tous les statuts</option>
                    <option value="attente">En attente</option>
                    <option value="confirme">Confirmé</option>
                    <option value="annule">Annulé</option>
                </select>

                <select aria-label="Filtrer par date">
                    <option value="">Toutes les dates</option>
                    <option value="aujourd-hui">Aujourd'hui</option>
                    <option value="semaine">Cette semaine</option>
                    <option value="mois">Ce mois</option>
                </select>

            </div>


            <!-- Tableau -->
            <div class="tableau-rdv">
                <div class="tableau-defilant">
                    <table>
                        <thead>
                            <tr>
                                <th>Référence</th>
                                <th>Patient</th>
                                <th>Médecin</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Motif</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>RDV-001</td>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-rdv">MK</span>
                                        <strong>Marie Kanku</strong>
                                    </div>
                                </td>
                                <td>Dr Jean Kabeya</td>
                                <td>12/11/2026</td>
                                <td>09:00</td>
                                <td>Consultation</td>
                                <td><span class="statut-rdv attente">En attente</span></td>
                                <td>
                                    <div class="actions-rdv">
                                        <button type="button" class="action-voir" title="Voir les détails">Voir</button>
                                        <button type="button" class="action-plus" title="Plus d'options">⋮</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>RDV-002</td>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-rdv avatar-vert">PL</span>
                                        <strong>Paul Lukusa</strong>
                                    </div>
                                </td>
                                <td>Dr Patrick Mbuyi</td>
                                <td>12/11/2026</td>
                                <td>10:00</td>
                                <td>Consultation</td>
                                <td><span class="statut-rdv confirme">Confirmé</span></td>
                                <td>
                                    <div class="actions-rdv">
                                        <button type="button" class="action-voir" title="Voir les détails">Voir</button>
                                        <button type="button" class="action-plus" title="Plus d'options">⋮</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>RDV-003</td>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-rdv avatar-orange">AN</span>
                                        <strong>Alice Nsimba</strong>
                                    </div>
                                </td>
                                <td>Dr Marie Ilunga</td>
                                <td>13/11/2026</td>
                                <td>08:00</td>
                                <td>Consultation</td>
                                <td><span class="statut-rdv confirme">Confirmé</span></td>
                                <td>
                                    <div class="actions-rdv">
                                        <button type="button" class="action-voir" title="Voir les détails">Voir</button>
                                        <button type="button" class="action-plus" title="Plus d'options">⋮</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>RDV-004</td>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-rdv avatar-violet">JM</span>
                                        <strong>Jean Mbuyi</strong>
                                    </div>
                                </td>
                                <td>Dr Sarah Nsimba</td>
                                <td>13/11/2026</td>
                                <td>11:00</td>
                                <td>Radiologie</td>
                                <td><span class="statut-rdv attente">En attente</span></td>
                                <td>
                                    <div class="actions-rdv">
                                        <button type="button" class="action-voir" title="Voir les détails">Voir</button>
                                        <button type="button" class="action-plus" title="Plus d'options">⋮</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>RDV-005</td>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-rdv avatar-rose">CN</span>
                                        <strong>Carine Nlandu</strong>
                                    </div>
                                </td>
                                <td>Dr Jean Kabeya</td>
                                <td>14/11/2026</td>
                                <td>09:00</td>
                                <td>Consultation</td>
                                <td><span class="statut-rdv annule">Annulé</span></td>
                                <td>
                                    <div class="actions-rdv">
                                        <button type="button" class="action-voir" title="Voir les détails">Voir</button>
                                        <button type="button" class="action-plus" title="Plus d'options">⋮</button>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>RDV-006</td>
                                <td>
                                    <div class="patient-identite">
                                        <span class="avatar-rdv avatar-bleu">BK</span>
                                        <strong>Bernard Kabeya</strong>
                                    </div>
                                </td>
                                <td>Dr Patrick Mbuyi</td>
                                <td>14/11/2026</td>
                                <td>14:00</td>
                                <td>Consultation</td>
                                <td><span class="statut-rdv confirme">Confirmé</span></td>
                                <td>
                                    <div class="actions-rdv">
                                        <button type="button" class="action-voir" title="Voir les détails">Voir</button>
                                        <button type="button" class="action-plus" title="Plus d'options">⋮</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-rdv">
                    <span>Affichage de 1 à 6 sur 246 rendez-vous</span>

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


        <div class="note-administration">
            <span class="note-icone">ℹ</span>
            <p>
                <strong>Information :</strong>
                les rendez-vous, les patients et les statuts affichés
                sont fictifs et servent uniquement à illustrer cette page.
            </p>
        </div>

    </div>
</main>

<?php require __DIR__ . '/../src/footer.php'; ?>