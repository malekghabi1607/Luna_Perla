<main>
    <div class="simple-login-container">
        <h2 class="simple-login-title">Inscription</h2>

        <?php if (!empty($message)): ?>
            <p class="error-message" style="color: <?= strpos($message, 'réussie') ? 'green' : 'red'; ?>;">
                <?= htmlspecialchars($message); ?>
            </p>
        <?php endif; ?>

        <form action="../control/register.php" method="POST" class="simple-login-form">
            <div class="simple-input-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div class="simple-input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="simple-input-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            </div>

            <div class="simple-input-group">
                <label for="telephone">Téléphone</label>
                <input type="text" id="telephone" name="telephone">
            </div>

            <div class="simple-input-group">
                <label for="adresse">Adresse de livraison</label>
                <input type="text" id="adresse" name="adresse">
            </div>

            <button type="submit" class="simple-login-btn">S'inscrire</button>
        </form>
    </div>
</main>
