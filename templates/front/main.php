<main>
    <!--  Bannière principale -->
    <section class="banner">
        <img src="<?php echo $racine_path; ?>templates/front/images/banner.jpg" alt="Bannière Luna Perla">
    </section>

    <!--  Catégories principales -->
    <section class="categories">
        <div class="category">
            <a href="<?php echo $racine_path; ?>control/collection.php">
                <img src="<?php echo $racine_path; ?>templates/front/images/collection.jpg"
                    alt=" Collection">
                <h2> Collection</h2>
            </a>
        </div>
        <div class="category">
            <a href="<?php echo $racine_path; ?>control/soldes.php">
                <img src="<?php echo $racine_path; ?>templates/front/images/soldes.jpg" alt="Soldes">
                <h2>Soldes</h2>
            </a>
        </div>
        <div class="category">
            <a href="<?php echo $racine_path; ?>control/best-sellers.php">
                <img src="<?php echo $racine_path; ?>templates/front/images/best-sellers.jpg" alt="Best Sellers">
                <h2>Best Sellers</h2>
            </a*>
        </div>
    </section>

    <!--  Produits en vedette -->
    <section class="featured-products">
        <div class="product-grid">
            <div class="product">
                <img src="<?php echo $racine_path; ?>templates/front/images/bague-elegante.jpg" alt="Bague élégante">
                <h3>Bague Élégante</h3>
                <p>19,99€</p>
                <a href="<?php echo $racine_path; ?>control/bijou.php?id=4" class="btn">Voir</a>
            </div>
            <div class="product">
                <img src="<?php echo $racine_path; ?>templates/front/images/collier-raffine.jpg" alt="Collier raffiné">
                <h3>Collier Raffiné</h3>
                <p>22,99€</p>
                <a href="<?php echo $racine_path; ?>control/bijou.php?id=5" class="btn">Voir</a>
            </div>
            <div class="product">
                <img src="<?php echo $racine_path; ?>templates/front/images/bracelet-chic.jpg" alt="Bracelet chic">
                <h3>Bracelet Chic</h3>
                <p>19,99€</p>
                <a href="<?php echo $racine_path; ?>control/bijou.php?id=6" class="btn">Voir</a>
            </div>
            <div class="product">
                <img src="<?php echo $racine_path; ?>templates/front/images/collier-joana-1.jpg" alt="Collier Sautoir - JOANA">
                <h3>Collier Sautoir - JOANA</h3>
                <p>26,00€</p>
                <a href="<?php echo $racine_path; ?>control/bijou.php?id=1" class="btn">Voir</a>
            </div>

            <div class="product">
                <img src="<?php echo $racine_path; ?>templates/front/images/bague-ines-1.jpg" alt="Bague - INES">
                <h3>Bague - INES </h3>
                <p>19,00€</p>
                <a href="<?php echo $racine_path; ?>control/bijou.php?id=2" class="btn">Voir</a>
            </div>
            </div>
            <!--  Bouton pour voir toute la collection -->
            <div class="discover-more">
                <a href="<?php echo $racine_path; ?>control/collection.php" class="btn-large">Découvrir nos bijoux</a>
            </div>
    </section>


</main>