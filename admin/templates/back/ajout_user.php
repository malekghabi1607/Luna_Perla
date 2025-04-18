<main class="add-user-section">
  <h2>Ajouter un nouvel utilisateur</h2>

  <?php if (!empty($message)): ?>
    <p class="user-message" style="color: <?= strpos($message, '✅') !== false ? 'green' : 'red'; ?>">
      <?= htmlspecialchars($message); ?>
    </p>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
    <input type="password" name="confirm_password" placeholder="Confirmer mot de passe" required>
    <input type="text" name="telephone" placeholder="Téléphone" required>
    <input type="text" name="adresse" placeholder="Adresse" required>
    <button type="submit">Ajouter</button>
</form>
</main>
