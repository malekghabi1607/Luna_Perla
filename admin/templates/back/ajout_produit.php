<main class="add-product-section">
  <h2>Ajouter un nouveau produit</h2>

  <?php if (!empty($message)): ?>
    <p style="color: <?= strpos($message, '✅') !== false ? 'green' : 'red'; ?>">
      <?= htmlspecialchars($message); ?>
    </p>
  <?php endif; ?>

  <form method="POST" action="">
    <label for="base_id">Base Produit:</label>
    <select name="base_id" required>
      <option value="">-- Choisir une base --</option>
      <?php foreach ($baseProduits as $base): ?>
        <option value="<?= $base->id ?>">
          <?= htmlspecialchars($base->name) ?> 
        </option>
      <?php endforeach; ?>
    </select><br>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">

    <input type="text" name="specific_name" placeholder="Nom spécifique" required><br>
    <input type="number" step="0.01" name="prix" placeholder="Prix (€)" required><br>
    <input type="number" name="stock" placeholder="Stock" required><br>
    <input type="text" name="image" placeholder="Chemin de l'image" required><br>
    <select name="availability" required>
      <option value="1">En stock</option>
      <option value="0">Rupture</option>
    </select><br>
    <textarea name="description" placeholder="Description" rows="4" required></textarea><br>
    <button type="submit">Ajouter</button>
  </form>
</main>
