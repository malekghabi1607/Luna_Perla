<div class="product-card" data-price="<?= htmlspecialchars($prix_produit) ?>">
    <a href="<?= htmlspecialchars($lien_fiche_produit) ?>">
        
    <?php if (!empty($tableauimages) && isset($tableauimages[0])): ?>
    <img src="<?= htmlspecialchars($base_url . '/' . $tableauimages[0]->image_path) ?>" 
         alt="<?= htmlspecialchars($nom_produit) ?>">
    <?php else: ?>
        <img src="<?= htmlspecialchars($base_url . '/images/default.jpg') ?>" alt="Image non disponible">
    <?php endif; ?>

    </a>

    <h3>
        <a href="<?= htmlspecialchars($base_url . "/bijou-" . $produit->id) ?>">
            <?= htmlspecialchars($nom_produit) ?>
        </a>
    </h3>

    <p><?= htmlspecialchars($prix_produit) ?>€</p>

    <a href="<?= htmlspecialchars($lien_fiche_produit) ?>" class="btn-details">Voir le produit</a>
</div>
