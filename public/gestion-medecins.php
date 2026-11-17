
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion des médecins | Clinique Santé Plus</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/gestion-medecins.css">
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
                    <li><a href="gestion-medecins.php" aria-current="page">Médecins</a></li>
                    <li><a href="gestion-salles.php">Salles</a></li>
                    <li><a href="gestion-disponibilites.php">Disponibilités</a></li>
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

<main class="conteneur page-medecins">

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
