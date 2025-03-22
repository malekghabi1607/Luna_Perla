        <!-- Début du footer -->
        <footer>
            <!-- Conteneur principal du footer -->
            <div class="footer-container">
            
                <!-- Section "La Marque" -->
                <div class="footer-section">
                    <h3>La Marque</h3>
                    <ul>
                        <!-- Lien vers la page d'accueil -->
                        <li><a href="<?php echo $racine_path; ?>control/accueil.php">Luna Perla</a></li>
                    </ul>
                </div>
                
                <!-- Section "Services Client" -->
                <div class="footer-section">
                    <h3>Services Client</h3>
                    <ul>
                        <!-- Lien vers la page FAQ -->
                        <li><a href="<?php echo $racine_path; ?>control/FAQ.php">F.A.Q</a></li>
                    </ul>
                </div>
                
                <!-- Section "Services Admin" -->
                <div class="footer-section">
                    <h3>Services Admin</h3>
                    <!-- Liste de navigation pour le dashboard -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $racine_path.'control/dashboard.php'; ?>"> Dashboard </a>
                        </li>
                    </ul>
                </div>
            
            </div>
            
            <!-- Contenu inférieur du footer -->
            <div class="footer-bottom">
                <p>&copy; 2025 Luna Perla - Tous droits réservés</p>
            </div>
        </footer>
        <!-- Inclusion du script JavaScript personnalisé -->
        <script src="<?php echo $racine_path; ?>templates/back/js/script.js"></script>

        <!-- Passage de la variable PHP racinePath à JavaScript -->
    </body>
</html>