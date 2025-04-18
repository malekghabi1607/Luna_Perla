<main class="edit-user-section">
  <h2>Modifier l'utilisateur</h2>

  <?php if (!empty($message)): ?>
    <p class="user-update-message" style="color: <?= strpos($message, '✅') !== false ? 'green' : 'red'; ?>">
      <?= htmlspecialchars($message); ?>
    </p>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="hidden" name="id" value="<?= $userData->id ?>">
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    <div class="edit-input-group">
      <label for="username">Nom d'utilisateur :</label>
      <input type="text" id="username" name="username" value="<?= htmlspecialchars($userData->username) ?>" required>
    </div>

    <div class="edit-input-group">
      <label for="email">Email :</label>
      <input type="email" id="email" name="email" value="<?= htmlspecialchars($userData->email) ?>" required>
    </div>

    <div class="edit-input-group">
      <label for="phone">Téléphone :</label>
      <input type="text" id="phone" name="phone" value="<?= htmlspecialchars($userData->phone) ?>" required>
    </div>

    <div class="edit-input-group">
      <label for="shipping_address">Adresse :</label>
      <input type="text" id="shipping_address" name="shipping_address" value="<?= htmlspecialchars($userData->shipping_address) ?>" required>
    </div>

    <button type="submit" class="edit-btn-primary">Enregistrer les modifications</button>
    
        <?php
        $path = $base_url . '/admin/dashboard'
        ?>
    <a href="<?php $base_url . '/admin/dashboard'?>" class="edit-btn-secondary">Annuler</a>
  </form>
</main>
