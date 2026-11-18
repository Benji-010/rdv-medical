<?php
$titrePage  = 'Nos médecins';
$pageActive = 'medecins';
$cssPage    = 'medecins.css';
require __DIR__ . '/../src/header.php';
?>

  <main id="contenu">

    <!-- INTRODUCTION -->
    <section class="intro-medecins">
      <div class="conteneur">

        <p class="surtitre">NOTRE ÉQUIPE MÉDICALE</p>

        <h1>Découvrez nos médecins</h1>

        <p class="texte">
          Notre équipe est composée de professionnels qualifiés
          et expérimentés, engagés à vous offrir des soins de
          qualité et un accompagnement adapté à vos besoins.
        </p>

      </div>
    </section>

    <!-- LISTE DES MÉDECINS -->
    <section class="conteneur section-medecins">

      <div class="section-titre">
        <div>
          <h2>Une équipe à votre écoute</h2>
          <p class="texte-doux">
            Découvrez les spécialistes de notre établissement.
          </p>
        </div>
      </div>

      <div class="grille-medecins">

        <!-- MÉDECIN 1 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-1.jpeg"
               alt="Portrait du docteur Jean Kabeya"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Cardiologie</span>

            <h3>Dr Jean Kabeya</h3>

            <p>
              Spécialiste des maladies cardiovasculaires,
              il assure le suivi et la prévention des
              maladies du cœur.
            </p>

          </div>
        </article>

        <!-- MÉDECIN 2 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-2.jpeg"
               alt="Portrait de la docteure Marie Ilunga"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Pédiatrie</span>

            <h3>Dr Marie Ilunga</h3>

            <p>
              Spécialisée dans la santé des enfants,
              elle accompagne les familles dans le suivi
              médical et le développement des petits.
            </p>

          </div>
        </article>

        <!-- MÉDECIN 3 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-3.jpeg"
               alt="Portrait du docteur Patrick Mbuyi"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Médecine générale</span>

            <h3>Dr Patrick Mbuyi</h3>

            <p>
              Il assure les consultations générales,
              les diagnostics et le suivi médical
              des patients.
            </p>

          </div>
        </article>

        <!-- MÉDECIN 4 -->
        <article class="carte-medecin">

          <img src="assets/img/medecin-4.jpeg"
               alt="Portrait de la docteure Sarah Nsimba"
               class="photo-medecin">

          <div class="infos-medecin">

            <span class="specialite">Radiologie</span>

            <h3>Dr Sarah Nsimba</h3>

            <p>
              Spécialisée en imagerie médicale,
              elle réalise et interprète les examens
              radiologiques.
            </p>

          </div>
        </article>

      </div>
    </section>

    <!-- APPEL À L'ACTION -->
    <section class="conteneur appel-medecins">

      <div>
        <h2>Besoin d'une consultation ?</h2>

        <p>
          Prenez rendez-vous avec l'un de nos médecins
          et bénéficiez d'un accompagnement adapté.
        </p>
      </div>

      <a href="demande-rendez-vous.php" class="btn btn-principal">
        Prendre rendez-vous
      </a>

    </section>

  </main>

<?php require __DIR__ . '/../src/footer.php'; ?>