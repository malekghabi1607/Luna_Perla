<div class="product-card" data-price="<?= htmlspecialchars($prix_produit) ?>">
    <a href="<?= $lien_fiche_produit ?>">
        <?php if (!empty($tableauimages) && isset($tableauimages[0])): ?>
            <img src="<?= $racine_path . htmlspecialchars($tableauimages[0]->image_path) ?>" 
                 alt="<?= htmlspecialchars($nom_produit) ?>">
        <?php else: ?>
            <img src="<?= $racine_path ?>images/default.jpg" alt="Image non disponible">
        <?php endif; ?>
    </a>
    <h3>
        <a href="<?= $lien_fiche_produit ?>">
            <?= htmlspecialchars($nom_produit) ?>
        </a>
    </h3>
    <p><?= htmlspecialchars($prix_produit) ?>€</p>
    <a href="<?= $lien_fiche_produit ?>" class="btn-details">Voir le produit</a>
    
</div>
