        <!-- Début du footer -->
        <footer>
            <!-- Conteneur principal du footer -->
            <div class="footer-container">
            
                <!-- Section "La Marque" -->
                <div class="footer-section">
                    <h3>La Marque</h3>
                    <ul>
                    <?php
                    $accueilPath = $base_url . '/admin/accueil'
                    ?>
                        <!-- Lien vers la page d'accueil -->
                        <li><a href="<?= $accueilPath ?>">Luna Perla</a></li>
                    </ul>
                </div>
                
                <!-- Section "Services Client" -->
                <div class="footer-section">
                    <h3>Services Client</h3>
                    <ul>
                        <!-- Lien vers la page FAQ -->
                        <li><a href="<?= $base_url ?>/admin/FAQ">F.A.Q</a></li>
                        <li><a href="<?= $base_url ?>/admin/documentation">Documentation Client</a></li>
                    </ul>
                </div>
                
                <!-- Section "Services Admin" -->
                <div class="footer-section">
                    <h3>Services Admin</h3>
                    <!-- Liste de navigation pour le dashboard -->
                    <ul class="navbar-nav">
                    <?php
                    $path = $base_url . '/admin/dashboard' 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $path ?>">Dashboard </a>
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

