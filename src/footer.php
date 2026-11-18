    <footer class="pied">
        <div class="conteneur pied-grille">

            <div class="pied-marque">
                <svg viewBox="0 0 32 32" aria-hidden="true">
                    <rect width="32" height="32" rx="8" fill="#1f6feb"/>
                    <path d="M5 17h6l3-7 4 13 3-8 2 2h4" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Clinique Santé Plus<small>Votre santé, notre priorité</small></span>
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
                    <?php if ($estAdmin): ?>
                        <li><a href="tableau-de-bord.php">Tableau de bord</a></li>
                        <li><a href="index.php">Voir le site</a></li>
                        <li><a href="logout.php">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="medecins.php">Médecins</a></li>
                        <li><a href="salles.php">Salles</a></li>
                        <li><a href="disponibilites.php">Disponibilités</a></li>
                        <li><a href="demande-rendez-vous.php">Prendre rendez-vous</a></li>
                        <li><a href="login.php">Connexion</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>

        <p class="pied-copyright">
            © <?= date('Y') ?> Clinique Santé Plus. Projet de Programmation Web 2, Université Catholique du Congo.
        </p>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>