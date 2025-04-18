<h1>Collection</h1>
<p class="collection-description">Découvrez notre gamme de bijoux élégants et raffinés.</p>

<?php if (!empty($products) && is_array($products)): ?>
    <?php foreach ($products as $product): ?>
        <?php
            $id = (int) $product["id"];
            $url = "{$base_url}/bijou-{$id}";
            $nom = htmlspecialchars($product["specific_name"]);
            $prix = number_format((float)$product["prix"], 2, ',', ' ');
            $image = $base_url . '/images/products/' . htmlspecialchars($product["image"]);

        ?>
        <div class="product-card" data-price="<?= $prix ?>">
            <a href="<?= $url ?>">
                <img src="<?= $image ?>" alt="<?= $nom ?>">
            </a>
            <h3><a href="<?= $url ?>"><?= $nom ?></a></h3>
            <p><?= $prix ?>€</p>
            <a href="<?= $url ?>" class="btn-details">Voir le bijou</a>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun produit disponible.</p>
<?php endif; ?>

<script src="../js/script.js"></script>
