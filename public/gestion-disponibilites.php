<?php
require_once __DIR__ . '/../src/Auth.php';
require_once __DIR__ . '/../src/MedecinService.php';
require_once __DIR__ . '/../src/SalleService.php';
require_once __DIR__ . '/../src/DisponibiliteService.php';

Auth::exigerConnexion();

function e($valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

$cibles = [
    'medecin' => [
        'cle' => 'id_medecin', 'colonne' => 'Médecin', 'choisir' => 'Choisir un médecin',
        'titreHoraires' => 'Horaires de travail des médecins',
        'titreAbsences' => 'Absences des médecins',
        'texteAbsences' => 'Congés, absences, réunions et formations.',
        'liste' => [],
    ],
    'salle' => [
        'cle' => 'id_salle', 'colonne' => 'Salle', 'choisir' => 'Choisir une salle',
        'titreHoraires' => 'Horaires d’ouverture des salles',
        'titreAbsences' => 'Fermetures et maintenances des salles',
        'texteAbsences' => 'Maintenance, désinfection, pannes et fermetures.',
        'liste' => [],
    ],
];

foreach (MedecinService::lister('', '', 1000) as $m) {
    $cibles['medecin']['liste'][$m['id_medecin']] = 'Dr ' . $m['medecin_prenom'] . ' ' . $m['medecin_nom'] . ' ' . $m['medecin_postnom'];
}
foreach (SalleService::lister('', '', 1000) as $s) {
    $cibles['salle']['liste'][$s['id_salle']] = $s['salle_nom'];
}

$succes     = $_SESSION['succes'] ?? '';
unset($_SESSION['succes']);
$erreurs    = [];
$postCible  = $_POST['cible'] ?? '';
$postType   = $_POST['type'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($cibles[$postCible])) {
    try {
        switch ($postType) {
            case 'supprimer-horaire':
                DisponibiliteService::supprimerHoraire($postCible, (int) ($_POST['id'] ?? 0));
                $_SESSION['succes'] = 'L’horaire a été supprimé.';
                header('Location: gestion-disponibilites.php');
                exit;

            case 'supprimer-absence':
                DisponibiliteService::supprimerAbsence($postCible, (int) ($_POST['id'] ?? 0));
                $_SESSION['succes'] = 'La période a été supprimée.';
                header('Location: gestion-disponibilites.php');
                exit;

            case 'horaires':
                $erreurs = DisponibiliteService::validerHoraires($postCible, $_POST);
                if (!$erreurs) {
                    $nb = DisponibiliteService::ajouterHoraires($postCible, $_POST);
                    $_SESSION['succes'] = $nb . ' horaire(s) enregistré(s).';
                    header('Location: gestion-disponibilites.php');
                    exit;
                }
                break;

            case 'absence':
                $erreurs = DisponibiliteService::validerAbsence($postCible, $_POST);
                if (!$erreurs) {
                    DisponibiliteService::ajouterAbsence($postCible, $_POST);
                    $_SESSION['succes'] = 'La période a été enregistrée.';
                    header('Location: gestion-disponibilites.php');
                    exit;
                }
                break;
        }
    } catch (RuntimeException $ex) {
        $erreurs[] = $ex->getMessage();
    }
}

// Valeur à réafficher dans un formulaire après une erreur
function ancien(string $cible, string $type, string $champ, string $defaut = ''): string
{
    global $postCible, $postType;
    return ($postCible === $cible && $postType === $type) ? (string) ($_POST[$champ] ?? $defaut) : $defaut;
}

$filtre = ['medecin' => (int) ($_GET['id_medecin'] ?? 0), 'salle' => (int) ($_GET['id_salle'] ?? 0)];
$filtrer = fn(array $lignes, int $id) => $id > 0
    ? array_values(array_filter($lignes, fn($l) => (int) $l['id_cible'] === $id))
    : $lignes;

$horaires = [];
$absences = [];
foreach (array_keys($cibles) as $c) {
    $horaires[$c] = DisponibiliteService::horaires($c);
    $absences[$c] = DisponibiliteService::absences($c);
}

$jmy = fn(string $date) => date('d/m/Y', strtotime($date));
$hm  = fn(string $heure) => substr($heure, 0, 5);

$titrePage  = 'Gestion des disponibilités';
$pageActive = 'gestion-disponibilites';
$cssPage    = 'gestion-disponibilites.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="conteneur page-disponibilites">

    <section class="entete-page">
        <div>
            <span class="sur-titre">ADMINISTRATION</span>
            <h1>Gestion des disponibilités</h1>
            <p>Organisez les horaires de travail, les absences et les fermetures qui déterminent les créneaux de rendez-vous.</p>
        </div>
    </section>

    <section class="resume-disponibilites">
        <article class="resume-carte">
            <div class="resume-icone">🕒</div>
            <div><p>Horaires des médecins</p><h2><?= count($horaires['medecin']) ?></h2></div>
        </article>
        <article class="resume-carte">
            <div class="resume-icone occupe">●</div>
            <div><p>Absences des médecins</p><h2><?= count($absences['medecin']) ?></h2></div>
        </article>
        <article class="resume-carte">
            <div class="resume-icone disponible">✓</div>
            <div><p>Horaires des salles</p><h2><?= count($horaires['salle']) ?></h2></div>
        </article>
        <article class="resume-carte">
            <div class="resume-icone occupe">●</div>
            <div><p>Fermetures des salles</p><h2><?= count($absences['salle']) ?></h2></div>
        </article>
    </section>

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

    <form class="outils-disponibilites" action="gestion-disponibilites.php" method="get">
        <select name="id_medecin" aria-label="Filtrer par médecin">
            <option value="">Tous les médecins</option>
            <?php foreach ($cibles['medecin']['liste'] as $id => $nom): ?>
                <option value="<?= (int) $id ?>" <?= $filtre['medecin'] === (int) $id ? 'selected' : '' ?>><?= e($nom) ?></option>
            <?php endforeach; ?>
        </select>

        <select name="id_salle" aria-label="Filtrer par salle">
            <option value="">Toutes les salles</option>
            <?php foreach ($cibles['salle']['liste'] as $id => $nom): ?>
                <option value="<?= (int) $id ?>" <?= $filtre['salle'] === (int) $id ? 'selected' : '' ?>><?= e($nom) ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn btn-secondaire">Filtrer</button>
    </form>

    <?php foreach ($cibles as $c => $cfg): ?>

        <!-- Horaires -->
        <section class="panneau" id="horaires-<?= $c ?>" style="margin-top: 1.5rem;">
            <div class="section-entete">
                <div>
                    <h2><?= e($cfg['titreHoraires']) ?></h2>
                    <p>Choisissez un ou plusieurs jours : une ligne est créée pour chaque jour.</p>
                </div>
            </div>

            <form class="formulaire" action="gestion-disponibilites.php#horaires-<?= $c ?>" method="post">
                <input type="hidden" name="cible" value="<?= $c ?>">
                <input type="hidden" name="type" value="horaires">

                <div class="formulaire-grille">
                    <div class="champ">
                        <label for="<?= $c ?>-h-cible"><?= e($cfg['colonne']) ?> *</label>
                        <select id="<?= $c ?>-h-cible" name="<?= $cfg['cle'] ?>" required>
                            <option value=""><?= e($cfg['choisir']) ?></option>
                            <?php foreach ($cfg['liste'] as $id => $nom): ?>
                                <option value="<?= (int) $id ?>" <?= ancien($c, 'horaires', $cfg['cle']) === (string) $id ? 'selected' : '' ?>><?= e($nom) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-h-debut">Heure de début *</label>
                        <input type="time" id="<?= $c ?>-h-debut" name="heure_debut" required value="<?= e(ancien($c, 'horaires', 'heure_debut', '08:00')) ?>">
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-h-fin">Heure de fin *</label>
                        <input type="time" id="<?= $c ?>-h-fin" name="heure_fin" required value="<?= e(ancien($c, 'horaires', 'heure_fin', '17:00')) ?>">
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-h-du">Valable du *</label>
                        <input type="date" id="<?= $c ?>-h-du" name="valide_du" required value="<?= e(ancien($c, 'horaires', 'valide_du', date('Y-m-d'))) ?>">
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-h-au">Valable jusqu'au *</label>
                        <input type="date" id="<?= $c ?>-h-au" name="valide_au" required value="<?= e(ancien($c, 'horaires', 'valide_au')) ?>">
                    </div>
                </div>

                <fieldset class="champ" style="border: 0; padding: 0;">
                    <legend>Jours *</legend>
                    <?php
                    $joursCoches = ($postCible === $c && $postType === 'horaires' && is_array($_POST['jours'] ?? null)) ? $_POST['jours'] : [];
                    foreach (DisponibiliteService::jours() as $jour): ?>
                        <label style="display: inline-flex; gap: 0.35rem; margin-right: 1rem;">
                            <input type="checkbox" name="jours[]" value="<?= e($jour) ?>" style="width: auto;" <?= in_array($jour, $joursCoches, true) ? 'checked' : '' ?>>
                            <?= e($jour) ?>
                        </label>
                    <?php endforeach; ?>
                </fieldset>

                <div class="formulaire-actions">
                    <button type="submit" class="btn btn-principal">Ajouter les horaires</button>
                </div>
            </form>

            <div class="tableau-defilant" style="margin-top: 1.5rem;">
                <table class="tableau">
                    <thead>
                        <tr>
                            <th><?= e($cfg['colonne']) ?></th>
                            <th>Jour</th>
                            <th>Horaires</th>
                            <th>Valable</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $lignes = $filtrer($horaires[$c], $filtre[$c]); ?>
                        <?php if (!$lignes): ?>
                            <tr><td colspan="6">Aucun horaire enregistré.</td></tr>
                        <?php endif; ?>
                        <?php foreach ($lignes as $l): ?>
                            <tr>
                                <td><strong><?= e($l['nom']) ?></strong></td>
                                <td><?= e($l['jour']) ?></td>
                                <td><?= $hm($l['heure_debut']) ?> – <?= $hm($l['heure_fin']) ?></td>
                                <td>du <?= $jmy($l['valide_du']) ?> au <?= $jmy($l['valide_au']) ?></td>
                                <td><span class="badge badge-succes"><?= e($l['statut']) ?></span></td>
                                <td>
                                    <form action="gestion-disponibilites.php#horaires-<?= $c ?>" method="post" class="actions"
                                          onsubmit="return confirm('Supprimer cet horaire ?');">
                                        <input type="hidden" name="cible" value="<?= $c ?>">
                                        <input type="hidden" name="type" value="supprimer-horaire">
                                        <input type="hidden" name="id" value="<?= (int) $l['id'] ?>">
                                        <button type="submit" class="action-btn supprimer">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Absences ou fermetures -->
        <section class="panneau" id="absences-<?= $c ?>" style="margin-top: 1.5rem;">
            <div class="section-entete">
                <div>
                    <h2><?= e($cfg['titreAbsences']) ?></h2>
                    <p><?= e($cfg['texteAbsences']) ?></p>
                </div>
            </div>

            <form class="formulaire" action="gestion-disponibilites.php#absences-<?= $c ?>" method="post">
                <input type="hidden" name="cible" value="<?= $c ?>">
                <input type="hidden" name="type" value="absence">

                <div class="formulaire-grille">
                    <div class="champ">
                        <label for="<?= $c ?>-a-cible"><?= e($cfg['colonne']) ?> *</label>
                        <select id="<?= $c ?>-a-cible" name="<?= $cfg['cle'] ?>" required>
                            <option value=""><?= e($cfg['choisir']) ?></option>
                            <?php foreach ($cfg['liste'] as $id => $nom): ?>
                                <option value="<?= (int) $id ?>" <?= ancien($c, 'absence', $cfg['cle']) === (string) $id ? 'selected' : '' ?>><?= e($nom) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-a-motif">Motif *</label>
                        <select id="<?= $c ?>-a-motif" name="motif" required>
                            <option value="">Choisir un motif</option>
                            <?php foreach (DisponibiliteService::motifs($c) as $motif): ?>
                                <option value="<?= e($motif) ?>" <?= ancien($c, 'absence', 'motif') === $motif ? 'selected' : '' ?>><?= e($motif) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-a-dd">Du *</label>
                        <input type="date" id="<?= $c ?>-a-dd" name="date_debut" required value="<?= e(ancien($c, 'absence', 'date_debut')) ?>">
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-a-hd">Heure de début *</label>
                        <input type="time" id="<?= $c ?>-a-hd" name="heure_debut" required value="<?= e(ancien($c, 'absence', 'heure_debut', '08:00')) ?>">
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-a-df">Au *</label>
                        <input type="date" id="<?= $c ?>-a-df" name="date_fin" required value="<?= e(ancien($c, 'absence', 'date_fin')) ?>">
                    </div>
                    <div class="champ">
                        <label for="<?= $c ?>-a-hf">Heure de fin *</label>
                        <input type="time" id="<?= $c ?>-a-hf" name="heure_fin" required value="<?= e(ancien($c, 'absence', 'heure_fin', '17:00')) ?>">
                    </div>
                </div>

                <div class="formulaire-actions">
                    <button type="submit" class="btn btn-principal">Enregistrer la période</button>
                </div>
            </form>

            <div class="tableau-defilant" style="margin-top: 1.5rem;">
                <table class="tableau">
                    <thead>
                        <tr>
                            <th><?= e($cfg['colonne']) ?></th>
                            <th>Période</th>
                            <th>Motif</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $lignes = $filtrer($absences[$c], $filtre[$c]); ?>
                        <?php if (!$lignes): ?>
                            <tr><td colspan="5">Aucune période enregistrée.</td></tr>
                        <?php endif; ?>
                        <?php foreach ($lignes as $l): ?>
                            <tr>
                                <td><strong><?= e($l['nom']) ?></strong></td>
                                <td>du <?= $jmy($l['date_debut']) ?> <?= $hm($l['heure_debut']) ?> au <?= $jmy($l['date_fin']) ?> <?= $hm($l['heure_fin']) ?></td>
                                <td><?= e($l['motif']) ?></td>
                                <td><span class="badge <?= $l['statut'] === 'Annulée' ? 'badge-danger' : 'badge-succes' ?>"><?= e($l['statut']) ?></span></td>
                                <td>
                                    <form action="gestion-disponibilites.php#absences-<?= $c ?>" method="post" class="actions"
                                          onsubmit="return confirm('Supprimer cette période ?');">
                                        <input type="hidden" name="cible" value="<?= $c ?>">
                                        <input type="hidden" name="type" value="supprimer-absence">
                                        <input type="hidden" name="id" value="<?= (int) $l['id'] ?>">
                                        <button type="submit" class="action-btn supprimer">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

    <?php endforeach; ?>

</main>

<?php require __DIR__ . '/../src/footer.php'; ?>