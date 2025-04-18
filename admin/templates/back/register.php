<main>
    <div class="simple-login-container">
        <h2 class="simple-login-title">Inscription Admin</h2>

        <?php if (!empty($message)): ?>
            <p class="error-message" style="color: <?= strpos($message, 'réussie') ? 'green' : 'red'; ?>;">
                <?= htmlspecialchars($message); ?>
            </p>
        <?php endif; ?>

        <form id="adminRegistrationForm" method="POST" class="simple-login-form">
            <div class="simple-input-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" maxlength="100" required>
            </div>

            <div class="simple-input-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" maxlength="255" required>
            </div>

            <div class="simple-input-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" id="mot_de_passe" name="mot_de_passe" required>
            </div>

            <div class="simple-input-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <div class="simple-input-group">
                <label for="permissions">Permissions</label>
                <input type="text" id="permissions" name="permissions" maxlength="255" required>
            </div>

            <div class="simple-input-group">
                <label for="department">Département</label>
                <input type="text" id="department" name="department" maxlength="255" required>
            </div>

            <p class="error-message" id="error-message" style="color:red;"></p>

            <button type="submit" class="simple-login-btn">S'inscrire</button>
        </form>
    </div>
</main>


<script>
document.getElementById("adminRegistrationForm").addEventListener("submit", function(e) {
    let username = document.getElementById("username").value.trim();
    let email = document.getElementById("email").value.trim();
    let pwd = document.getElementById("mot_de_passe").value;
    let confirmPwd = document.getElementById("confirm_password").value;
    let permissions = document.getElementById("permissions").value.trim();
    let department = document.getElementById("department").value.trim();
    let msg = document.getElementById("error-message");

    msg.textContent = "";

    if (!username || !email || !pwd || !confirmPwd || !permissions || !department) {
        e.preventDefault();
        msg.textContent = "❌ Tous les champs sont obligatoires.";
        return false;
    }

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        e.preventDefault();
        msg.textContent = "❌ Format d'email invalide.";
        return false;
    }

    if (pwd !== confirmPwd) {
        e.preventDefault();
        msg.textContent = "❌ Les mots de passe ne correspondent pas.";
        return false;
    }

    if (pwd.length < 8 || !/[A-Z]/.test(pwd) || !/\d/.test(pwd)) {
        e.preventDefault();
        msg.textContent = "❌ Le mot de passe doit contenir au moins 8 caractères, une majuscule et un chiffre.";
        return false;
    }

    msg.classList.add("shake");
    setTimeout(() => msg.classList.remove("shake"), 500);
});
</script>