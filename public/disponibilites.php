<?php
$titrePage  = 'Disponibilités';
$pageActive = 'disponibilites';
$cssPage    = 'disponibilites.css';
require __DIR__ . '/../src/header.php';
?>

  <main id="contenu">

    <!-- INTRODUCTION -->
    <section class="intro-disponibilites">
      <div class="conteneur">

        <p class="surtitre">ORGANISEZ VOTRE VISITE</p>

        <h1>Disponibilités des médecins</h1>

        <p class="texte">
          Consultez les jours et horaires de consultation
          de nos médecins afin de choisir le moment qui
          vous convient le mieux.
        </p>

      </div>
    </section>

    <!-- HORAIRES GENERAUX -->
    <section class="conteneur resume-horaires">

      <div class="resume-icone">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="12" cy="12" r="9"/>
          <path d="M12 7v5l3 2"/>
        </svg>
      </div>

      <div class="resume-infos">
        <h2>Horaires de la clinique</h2>
        <p>
          <strong>Lundi au vendredi :</strong> 08:00 à 17:00
        </p>
        <p>
          <strong>Samedi :</strong> 08:00 à 12:00
        </p>
        <p>
          <strong>Dimanche :</strong> Fermé
        </p>
      </div>

    </section>

    <!-- TABLEAU DES DISPONIBILITES -->
    <section class="conteneur section-disponibilites">

      <div class="section-titre">
        <h2>Planning des consultations</h2>

        <p class="texte-doux">
          Retrouvez les horaires habituels de nos spécialistes.
        </p>
      </div>

      <div class="tableau-defilant">

        <table class="tableau-disponibilites">

          <thead>
            <tr>
              <th scope="col">Médecin</th>
              <th scope="col">Spécialité</th>
              <th scope="col">Jours de consultation</th>
              <th scope="col">Horaires</th>
              <th scope="col">Statut</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <td>
                <strong>Dr Jean Kabeya</strong>
              </td>
              <td>Cardiologie</td>
              <td>Lundi, Mercredi, Vendredi</td>
              <td>08:00 - 14:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Dr Marie Ilunga</strong>
              </td>
              <td>Pédiatrie</td>
              <td>Mardi, Jeudi, Samedi</td>
              <td>08:00 - 12:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Dr Patrick Mbuyi</strong>
              </td>
              <td>Médecine générale</td>
              <td>Lundi au Vendredi</td>
              <td>09:00 - 17:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

            <tr>
              <td>
                <strong>Dr Sarah Nsimba</strong>
              </td>
              <td>Radiologie</td>
              <td>Mardi, Mercredi, Vendredi</td>
              <td>08:00 - 15:00</td>
              <td>
                <span class="statut-disponible">
                  Disponible
                </span>
              </td>
            </tr>

          </tbody>

        </table>

      </div>

      <p class="note-tableau">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <circle cx="12" cy="12" r="9"/>
          <path d="M12 11v5M12 8h.01"/>
        </svg>

        Les horaires indiqués sont donnés à titre indicatif.
        Veuillez effectuer une demande de rendez-vous pour
        confirmer la disponibilité du médecin.
      </p>

    </section>

    <!-- APPEL A L'ACTION -->
    <section class="conteneur appel-disponibilites">

      <div>
        <h2>Vous avez trouvé un horaire qui vous convient ?</h2>

        <p>
          Effectuez une demande de rendez-vous en quelques clics.
        </p>
      </div>

      <a href="demande-rendez-vous.php" class="btn btn-principal">
        Prendre rendez-vous
      </a>

    </section>

  </main>

<?php require __DIR__ . '/../src/footer.php'; ?>