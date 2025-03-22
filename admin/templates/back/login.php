<!-- Page de connexion de l'utilisateur -->

<!-- Conteneur principal du formulaire de connexion -->
<div class="simple-login-container">
    <!-- Titre de la page de connexion -->
    <h2 class="simple-login-title">Connexion</h2>

    <!-- Formulaire de connexion -->
    <form id="loginForm" action="<?php echo $racine_path; ?>control/accueil.php" method="POST" class="simple-login-form">
        <!-- Groupe d'input pour l'adresse e-mail -->
        <div class="simple-input-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
            <!-- Message d'erreur pour une adresse e-mail invalide -->
            <span id="emailError" class="error-message" style="color: red; display: none;">
                Veuillez entrer une adresse e-mail valide.
            </span>
        </div>

        <!-- Groupe d'input pour le mot de passe -->
        <div class="simple-input-group">
            <label for="password">Mot de passe</label>
            <div class="simple-password-wrapper">
                <input type="password" id="password" name="password" required>
                <!-- Message d'erreur pour un mot de passe vide -->
                <span id="passwordError" class="error-message" style="color: red; display: none;">
                    Le mot de passe est requis.
                </span>
            </div>
        </div>

        <!-- Options de connexion (case "Se souvenir de moi") -->
        <div class="simple-options">
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
        </div>

        <!-- Bouton de soumission du formulaire de connexion -->
        <button type="submit" class="simple-login-btn">Se connecter</button>
    </form>
</div>

<!-- Script de validation du formulaire de connexion -->
