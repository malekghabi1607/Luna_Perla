<main class="edit-user-section">
  <h2>Modifier le produit</h2>

  <?php if (!empty($message)): ?>
    <p style="color: red;"><?= htmlspecialchars($message) ?></p>
  <?php endif; ?>

  <form method="POST">
    <input type="text" name="specific_name" value="<?= htmlspecialchars($produit->specific_name) ?>" required><br>
    <input type="number" step="0.01" name="prix" value="<?= $produit->prix ?>" required><br>
    <input type="number" name="stock" value="<?= $produit->stock ?>" required><br>
    <input type="text" name="image" value="<?= htmlspecialchars($produit->image) ?>" required><br>
    <select name="availability" required>
      <option value="1" <?= $produit->availability ? 'selected' : '' ?>>En stock</option>
      <option value="0" <?= !$produit->availability ? 'selected' : '' ?>>Rupture</option>
    </select><br>
    <textarea name="description" rows="4"><?= htmlspecialchars($produit->description) ?></textarea><br>
    <button type="submit">Enregistrer les modifications</button>
  </form>
</main>