<!-- Contenu de la fiche produit -->

<!-- Conteneur principal de la fiche bijou -->
<div class="fiche_bijou_style">

    <!-- Section détaillant le produit -->
    <div class="product-detail">
    
        <!-- Galerie d'images du produit -->
        <div class="product-gallery">
            <!-- Image principale du bijou -->
            <div class="main-image">
                <img src="<?php echo $product['main_image']; ?>" alt="<?php echo $product['main_image_alt']; ?>" id="mainImage">
            </div>
        </div>

        <!-- Informations détaillées du bijou -->
        <div class="product-info">
            <!-- Nom du produit -->
            <h1><?php echo $product['name']; ?></h1>
            <!-- Prix du produit -->
            <p class="price"><?php echo $product['price']; ?></p>

            <!-- Options de couleur disponibles pour le produit -->
            <div class="product-options">
                <label>COULEUR :</label>
                <span class="color-option gold"></span>
                <span class="color-option silver"></span>
            </div>

            <!-- Statut de stock et informations de paiement -->
            <p class="stock-status"><?php echo $product['stock_status']; ?></p>
            <p class="payment-info"><?php echo $product['payment_info']; ?></p>
        </div>
    </div>

    <!-- Section Description détaillée du produit -->
    <section class="product-description">
        <!-- Titre de la description -->
        <h2><?php echo $product['description_title']; ?></h2>
        <!-- Boucle sur chaque paragraphe de la description -->
        <?php foreach ($product['description'] as $desc): ?>
            <p><?php echo $desc; ?></p>
        <?php endforeach; ?>
    </section>

    <!-- Section Spécifications du produit -->
    <section class="product-specs">
        <!-- Titre des spécifications -->
        <h2>Spécifications du bijou</h2>
        <!-- Tableau des spécifications -->
        <table>
            <!-- Boucle sur chaque spécification -->
            <?php foreach ($product['specs'] as $spec): ?>
                <tr>
                    <td><strong><?php echo $spec[0]; ?></strong></td>
                    <td><?php echo $spec[1]; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
    
</div>