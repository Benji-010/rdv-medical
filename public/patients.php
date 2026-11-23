<?php
require_once __DIR__ . '/../src/Auth.php';
require_once __DIR__ . '/../src/PatientService.php';

Auth::exigerConnexion();   // renvoie vers login.php si personne n'est connecté (démarre aussi la session)

// Affiche du texte en toute sécurité : neutralise le HTML qu'un utilisateur aurait saisi.
function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$erreurs = [];
$donnees = [];                               // valeurs affichées dans le formulaire
$idModif = (int) ($_GET['modifier'] ?? 0);   // > 0 quand on modifie un patient existant

// Message de succès mémorisé juste avant la redirection (affiché une seule fois).
$succes = $_SESSION['succes'] ?? '';
unset($_SESSION['succes']);

// ---- Traitement du formulaire (ajout ou modification) ----
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $donnees = $_POST;
    $idModif = (int) ($_POST['id_patient'] ?? 0);

    // Validation côté serveur : la liste est vide si tout est correct.
    $erreurs = PatientService::valider($donnees);

    if (!$erreurs) {
        try {
            if ($idModif > 0) {
                PatientService::modifier($idModif, $donnees);
                $_SESSION['succes'] = 'Le patient a été modifié.';
            } else {
                PatientService::ajouter($donnees);
                $_SESSION['succes'] = 'Le patient a été enregistré.';
            }
            // Redirection : évite de renvoyer le formulaire si on actualise la page.
            header('Location: patients.php');
            exit;
        } catch (RuntimeException $ex) {
            // Par exemple : numéro de téléphone déjà utilisé.
            $erreurs[] = $ex->getMessage();
        }
    }
} elseif ($idModif > 0) {
    // Clic sur « Dossier » : on remplit le formulaire avec le patient choisi.
    $donnees = PatientService::trouver($idModif) ?? [];
    if (!$donnees) {
        $idModif = 0; // patient introuvable : on repasse en mode ajout
    }
}

// ---- Liste, recherche et pagination ----
$recherche = trim($_GET['recherche'] ?? '');
$parPage   = 10;
$total     = PatientService::compter($recherche);
$nbPages   = max(1, (int) ceil($total / $parPage));
$page      = min(max(1, (int) ($_GET['page'] ?? 1)), $nbPages);
$patients  = PatientService::lister($recherche, $parPage, ($page - 1) * $parPage);

$totalPatients   = PatientService::compter();
$avecRendezVous  = PatientService::compterAvecRendezVous();
$debut           = $total > 0 ? ($page - 1) * $parPage + 1 : 0;
$fin             = min($total, $page * $parPage);

$couleursAvatar = ['', 'avatar-bleu', 'avatar-orange', 'avatar-violet', 'avatar-rose', 'avatar-vert'];

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

            <a href="#formulaire-patient" class="btn btn-principal">
                + Ajouter un patient
            </a>
        </section>


        <section class="patients-resume">
            <article class="resume-patient">
                <span class="resume-patient-icone">♙</span>
                <div>
                    <p>Total des patients</p>
                    <h2><?= $totalPatients ?></h2>
                </div>
            </article>

            <article class="resume-patient">
                <span class="resume-patient-icone resume-vert">▣</span>
                <div>
                    <p>Patients avec rendez-vous</p>
                    <h2><?= $avecRendezVous ?></h2>
                </div>
            </article>
        </section>


        <!-- Formulaire : ajout ou modification -->
        <section class="panneau" id="formulaire-patient" aria-labelledby="titre-formulaire" style="margin-block: 1.5rem 2.5rem;">
            <h2 id="titre-formulaire"><?= $idModif > 0 ? 'Modifier le patient' : 'Nouveau patient' ?></h2>

            <?php if ($succes !== ''): ?>
                <div class="alerte alerte-succes" role="status"><?= e($succes) ?></div>
            <?php endif; ?>

            <?php if ($erreurs): ?>
                <div class="alerte alerte-erreur" role="alert">
                    <ul>
                        <?php foreach ($erreurs as $erreur): ?>
                            <li><?= e($erreur) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form class="formulaire" action="patients.php" method="post">
                <?php if ($idModif > 0): ?>
                    <input type="hidden" name="id_patient" value="<?= $idModif ?>">
                <?php endif; ?>

                <div class="formulaire-grille">
                    <div class="champ">
                        <label for="patient_nom">Nom *</label>
                        <input type="text" id="patient_nom" name="patient_nom" maxlength="100" required
                               value="<?= e($donnees['patient_nom'] ?? '') ?>">
                    </div>
                    <div class="champ">
                        <label for="patient_postnom">Postnom *</label>
                        <input type="text" id="patient_postnom" name="patient_postnom" maxlength="100" required
                               value="<?= e($donnees['patient_postnom'] ?? '') ?>">
                    </div>
                    <div class="champ">
                        <label for="patient_prenom">Prénom *</label>
                        <input type="text" id="patient_prenom" name="patient_prenom" maxlength="100" required
                               value="<?= e($donnees['patient_prenom'] ?? '') ?>">
                    </div>
                    <div class="champ">
                        <label for="patient_sexe">Sexe *</label>
                        <select id="patient_sexe" name="patient_sexe" required>
                            <option value="">Choisir</option>
                            <option value="M" <?= ($donnees['patient_sexe'] ?? '') === 'M' ? 'selected' : '' ?>>Masculin</option>
                            <option value="F" <?= ($donnees['patient_sexe'] ?? '') === 'F' ? 'selected' : '' ?>>Féminin</option>
                        </select>
                    </div>
                    <div class="champ">
                        <label for="patient_telephone">Téléphone *</label>
                        <input type="tel" id="patient_telephone" name="patient_telephone" maxlength="20" required
                               placeholder="+243 ..." value="<?= e($donnees['patient_telephone'] ?? '') ?>">
                    </div>
                    <div class="champ">
                        <label for="patient_province">Province</label>
                        <input type="text" id="patient_province" name="patient_province" maxlength="100"
                               value="<?= e($donnees['patient_province'] ?? '') ?>">
                    </div>
                    <div class="champ">
                        <label for="patient_ville">Ville</label>
                        <input type="text" id="patient_ville" name="patient_ville" maxlength="100"
                               value="<?= e($donnees['patient_ville'] ?? '') ?>">
                    </div>
                    <div class="champ">
                        <label for="patient_commune">Commune</label>
                        <input type="text" id="patient_commune" name="patient_commune" maxlength="100"
                               value="<?= e($donnees['patient_commune'] ?? '') ?>">
                    </div>
                </div>

                <div class="formulaire-actions">
                    <button type="submit" class="btn btn-principal">
                        <?= $idModif > 0 ? 'Enregistrer les modifications' : 'Enregistrer le patient' ?>
                    </button>
                    <?php if ($idModif > 0): ?>
                        <a href="patients.php" class="btn btn-secondaire">Annuler</a>
                    <?php endif; ?>
                </div>
            </form>
        </section>


        <section class="section-liste-patients">

            <div class="titre-section-admin">
                <div>
                    <h2>Liste des patients</h2>
                    <p>Retrouvez les patients enregistrés dans la clinique.</p>
                </div>
            </div>

            <form class="outils-patients" action="patients.php" method="get">
                <div class="recherche-patient">
                    <span>⌕</span>
                    <input type="search" name="recherche" placeholder="Rechercher par nom ou téléphone..."
                           aria-label="Rechercher un patient" value="<?= e($recherche) ?>">
                </div>
                <button type="submit" class="btn btn-secondaire">Rechercher</button>
            </form>


            <div class="panneau tableau-patients">
                <div class="tableau-defilant">
                    <table>
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Identifiant</th>
                                <th>Sexe</th>
                                <th>Téléphone</th>
                                <th>Ville</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (!$patients): ?>
                                <tr><td colspan="6">Aucun patient trouvé.</td></tr>
                            <?php endif; ?>

                            <?php foreach ($patients as $i => $p): ?>
                                <?php
                                $initiales = mb_strtoupper(mb_substr($p['patient_prenom'], 0, 1) . mb_substr($p['patient_nom'], 0, 1));
                                $couleur   = $couleursAvatar[$i % count($couleursAvatar)];
                                ?>
                                <tr>
                                    <td>
                                        <div class="patient-identite">
                                            <span class="avatar-patient <?= $couleur ?>"><?= e($initiales) ?></span>
                                            <strong><?= e($p['patient_nom'] . ' ' . $p['patient_postnom'] . ' ' . $p['patient_prenom']) ?></strong>
                                        </div>
                                    </td>
                                    <td>PAT-<?= str_pad($p['id_patient'], 3, '0', STR_PAD_LEFT) ?></td>
                                    <td><?= e($p['patient_sexe']) ?></td>
                                    <td><?= e($p['patient_telephone']) ?></td>
                                    <td><?= e($p['patient_ville'] ?? '—') ?></td>
                                    <td>
                                        <a href="patients.php?modifier=<?= (int) $p['id_patient'] ?>#formulaire-patient" class="action-patient">Dossier</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination-patients">
                    <span>Affichage de <?= $debut ?> à <?= $fin ?> sur <?= $total ?> patients</span>
                    <div>
                        <!-- display: contents : le formulaire n'ajoute pas de bloc, les boutons gardent leur style -->
                        <form action="patients.php" method="get" style="display: contents;">
                            <input type="hidden" name="recherche" value="<?= e($recherche) ?>">
                            <button type="submit" name="page" value="<?= $page - 1 ?>" <?= $page <= 1 ? 'disabled' : '' ?>>Précédent</button>
                            <?php for ($n = max(1, $page - 2); $n <= min($nbPages, $page + 2); $n++): ?>
                                <button type="submit" name="page" value="<?= $n ?>" <?= $n === $page ? 'class="page-active"' : '' ?>><?= $n ?></button>
                            <?php endfor; ?>
                            <button type="submit" name="page" value="<?= $page + 1 ?>" <?= $page >= $nbPages ? 'disabled' : '' ?>>Suivant</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>
</main>

<?php require __DIR__ . '/../src/footer.php'; ?>