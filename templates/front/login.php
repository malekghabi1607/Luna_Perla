<main>
<!-- Page de connexion de l'utilisateur -->
<div class="simple-login-container">
    <h2 class="simple-login-title">Connexion</h2>

    <?php if (isset($_GET['error'])): ?>
        <p class="error-message" style="color:red;">❌ Email ou mot de passe incorrect.</p>
    <?php endif; ?>

    <form id="loginForm" action="../../control/login.php" method="POST" class="simple-login-form">
        <div class="simple-input-group">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
            <span id="emailError" class="error-message" style="display: none;">Veuillez entrer une adresse e-mail valide.</span>
        </div>

        <div class="simple-input-group">
            <label for="password">Mot de passe</label>
            <div class="simple-password-wrapper">
                <input type="password" id="password" name="password" required>
                <span id="passwordError" class="error-message" style="display: none;">Le mot de passe est requis.</span>
            </div>
        </div>

        <div class="simple-options">
            <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
        </div>
        <div class="simple-register-link">
            <p>Pas encore de compte ? <a href="../control/register.php">Créer un compte</a></p>
        </div>



        <button type="submit" class="simple-login-btn">Se connecter</button>
    </form>
</div>

</main>