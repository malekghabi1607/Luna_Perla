
        <h1>Collection</h1>
        <p class="collection-description">Découvrez notre gamme de bijoux élégants et raffinés.</p>
            <?php if (isset($products) && is_array($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="product-card" data-price="<?= htmlspecialchars($product["prix"]) ?>">
                        <a href="../control/bijou.php?id=<?= $product["id"] ?>">
                            <img src="<?= $racine_path . htmlspecialchars($product["image"]) ?>"
                                 alt="<?= htmlspecialchars($product["specific_name"]) ?>">
                        </a>
                        <h3>
                            <a href="../control/bijou.php?id=<?= $product["id"] ?>">
                                <?= htmlspecialchars($product["specific_name"]) ?>
                            </a>
                        </h3>
                        <p><?= htmlspecialchars($product["prix"]) ?>€</p>
                        <a href="../control/bijou.php?id=<?= $product["id"] ?>" class="btn-details">Voir le bijou</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun produit disponible.</p>
            <?php endif; ?>
  
<script src="../js/script.js"></script>
