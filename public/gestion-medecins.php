<?php
require_once __DIR__ . '/../src/Auth.php';

// Si personne n'est connecté, renvoie vers login.php
Auth::exigerConnexion();

$titrePage  = 'Gestion des médecins';
$pageActive = 'gestion-medecins';
$cssPage    = 'gestion-medecins.css';
require __DIR__ . '/../src/header.php';
?>

<main id="contenu" class="conteneur page-medecins">

  <section class="entete-page">
    <div>
      <span class="sur-titre">ADMINISTRATION</span>
      <h1>Gestion des médecins</h1>
      <p>Consultez et gérez les informations des médecins de la clinique.</p>
    </div>

    <button class="btn btn-principal" type="button">
      + Ajouter un médecin
    </button>
  </section>

  <section class="resume-medecins">
    <article class="resume-carte">
      <span class="resume-icone">👨‍⚕️</span>
      <div>
        <p class="resume-label">Total des médecins</p>
        <h2>04</h2>
      </div>
    </article>

    <article class="resume-carte">
      <span class="resume-icone">✓</span>
      <div>
        <p class="resume-label">Médecins actifs</p>
        <h2>04</h2>
      </div>
    </article>

    <article class="resume-carte">
      <span class="resume-icone">＋</span>
      <div>
        <p class="resume-label">Spécialités représentées</p>
        <h2>04</h2>
      </div>
    </article>
  </section>

  <section class="panneau section-liste">
    <div class="section-entete">
      <div>
        <h2>Liste des médecins</h2>
        <p>Retrouvez ici les médecins enregistrés dans la clinique.</p>
      </div>
    </div>

    <div class="outils-liste">
      <div class="recherche-medecin">
        <input type="search" placeholder="Rechercher un médecin..." aria-label="Rechercher un médecin">
      </div>

      <select aria-label="Filtrer par spécialité">
        <option value="">Toutes les spécialités</option>
        <option>Cardiologie</option>
        <option>Pédiatrie</option>
        <option>Médecine générale</option>
        <option>Radiologie</option>
      </select>

      <select aria-label="Filtrer par statut">
        <option value="">Tous les statuts</option>
        <option>Actif</option>
        <option>Inactif</option>
      </select>
    </div>

    <div class="tableau-defilant">
      <table class="tableau">
        <thead>
          <tr>
            <th>Médecin</th>
            <th>Spécialité</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Statut</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>
              <div class="medecin-identite">
              <img src="assets/img/medecin-1.jpeg" alt="Docteur Jean Kabeya">  
                <strong>Dr Jean Kabeya</strong>
              </div>
            </td>
            <td>Cardiologie</td>
            <td>+243 810 000 001</td>
            <td>jean.kabeya@clinique.cd</td>
            <td><span class="badge badge-succes">Actif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn voir" type="button" aria-label="Voir Jean Kabeya">Voir</button>
                <button class="action-btn modifier" type="button" aria-label="Modifier Jean Kabeya">Modifier</button>
                <button class="action-btn supprimer" type="button" aria-label="Supprimer Jean Kabeya">Supprimer</button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="medecin-identite">
                <img src="assets/img/medecin-2.jpeg" alt="Dr Marie Ilunga">
                <strong>Dr Marie Ilunga</strong>
              </div>
            </td>
            <td>Pédiatrie</td>
            <td>+243 810 000 002</td>
            <td>marie.ilunga@clinique.cd</td>
            <td><span class="badge badge-succes">Actif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn voir" type="button" aria-label="Voir Marie Ilunga">Voir</button>
                <button class="action-btn modifier" type="button" aria-label="Modifier Marie Ilunga">Modifier</button>
                <button class="action-btn supprimer" type="button" aria-label="Supprimer Marie Ilunga">Supprimer</button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="medecin-identite">
                <img src="assets/img/medecin-3.jpeg" alt="Dr Patrick Mbuyi">
                <strong>Dr Patrick Mbuyi</strong>
              </div>
            </td>
            <td>Médecine générale</td>
            <td>+243 810 000 003</td>
            <td>patrick.mbuyi@clinique.cd</td>
            <td><span class="badge badge-succes">Actif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn voir" type="button" aria-label="Voir Patrick Mbuyi">Voir</button>
                <button class="action-btn modifier" type="button" aria-label="Modifier Patrick Mbuyi">Modifier</button>
                <button class="action-btn supprimer" type="button" aria-label="Supprimer Patrick Mbuyi">Supprimer</button>
              </div>
            </td>
          </tr>

          <tr>
            <td>
              <div class="medecin-identite">
                <img src="assets/img/medecin-4.jpeg" alt="Dr Sarah Nsimba">
                <strong>Dr Sarah Nsimba</strong>
              </div>
            </td>
            <td>Radiologie</td>
            <td>+243 810 000 004</td>
            <td>sarah.nsimba@clinique.cd</td>
            <td><span class="badge badge-succes">Actif</span></td>
            <td>
              <div class="actions">
                <button class="action-btn voir" type="button" aria-label="Voir Sarah Nsimba">Voir</button>
                <button class="action-btn modifier" type="button" aria-label="Modifier Sarah Nsimba">Modifier</button>
                <button class="action-btn supprimer" type="button" aria-label="Supprimer Sarah Nsimba">Supprimer</button>
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
    <p>Les informations affichées sont des données de démonstration. Les actions d'ajout, de modification et de suppression seront activées lors de la mise en place du backend.</p>
  </section>

</main>

<?php require __DIR__ . '/../src/footer.php'; ?>