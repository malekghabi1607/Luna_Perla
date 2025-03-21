<main>
    <section class="collection-container">
        <h1>Collection</h1>
        <p class="collection-description">Découvrez notre gamme de bijoux élégants et raffinés.</p>

        <!-- 📌 Liste des produits -->

        <div class="product-grid">
            <?php if (isset($products) && is_array($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <div class="product-card" data-price="<?php echo $product["price"]; ?>">
                                <a href="../control/bijou.php?id=<?php echo $product["id"]; ?>">
                                    <img src="<?php echo $racine_path . "templates/front/" . $product["image"]; ?>"
                                        alt="<?php echo $product["name"]; ?>">
                                </a>
                                <h3>
                                    <a href="../control/bijou.php?id=<?php echo $product["id"]; ?>">
                                        <?php echo $product["name"]; ?>
                                    </a>
                                </h3>
                                <p><?php echo $product["price"]; ?>€</p>
                                <a href="../control/bijou.php?id=<?php echo $product["id"]; ?>" class="btn-details">Voir le bijou</a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucun produit disponible.</p>
                    <?php endif; ?>
                </div>
    </section>
</main>

<script src="../js/script.js"></script>