<?php
$base_url = "/~uapv2500231/Luna_Perla";
?>

<main>
    <section class="banner">
        <img src="<?php echo $racine_path; ?>templates/front/images/banner.jpg" alt="Bannière Luna Perla">
    </section>

    <section class="categories">
        <div class="category">
            <a href="<?= $base_url ?>/collection">
                <img src="<?php echo $racine_path; ?>templates/front/images/collection.jpg" alt="Collection">
                <h2>Collection</h2>
            </a>
        </div>
        <div class="category">
            <a href="<?= $base_url ?>/soldes">
                <img src="<?php echo $racine_path; ?>templates/front/images/soldes.jpg" alt="Soldes">
                <h2>Soldes</h2>
            </a>
        </div>
        <div class="category">
            <a href="<?= $base_url ?>/best-sellers">
                <img src="<?php echo $racine_path; ?>templates/front/images/best-sellers.jpg" alt="Best Sellers">
                <h2>Best Sellers</h2>
            </a>
        </div>
    </section>
</main>