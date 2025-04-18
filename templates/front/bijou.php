<?php
// Définir l'image principale si des images sont disponibles
$image_produit = !empty($autres_images) ? $autres_images[0] : ''; 
?>
<main class="bijou-page-container">
    <div class="bijou-page">

        <!-- Partie gauche : galerie d'images -->
        <div class="bijou-gallery">
            <div class="bijou-main-image">
            <img id="mainImage" src="<?= htmlspecialchars($image_produit) ?>" 
     alt="Image principale du produit"
     onerror="this.src='<?= $base_url ?>/images/produits/boucles-lucie-1.jpg';">            </div>
            <div class="bijou-thumbnails">
                <?php if (!empty($autres_images)): ?>
                    <?php foreach ($autres_images as $index => $image): ?>
                        <img class="thumbnail" src="<?= htmlspecialchars($image) ?>"
                        alt="Miniature <?= $index + 1 ?>" onclick="changeImage(this)">
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Partie droite : informations produit -->
        <div class="bijou-info">
            <h1><?= htmlspecialchars($produit->specific_name) ?></h1>
            <p class="bijou-price"><?= htmlspecialchars($produit->prix) ?> €</p>

            <?php if ($produit->stock > 0): ?>
                <form action="<?= $base_url ?>/ajout_panier" method="POST">
                    <div class="bijou-options">
                        <p><strong>Couleur :</strong> <span id="selectedColor">Gold</span></p>
                        <div class="bijou-color-options">
                            <span class="bijou-color gold selected" onclick="selectColor('Gold', this)"></span>
                            <span class="bijou-color silver" onclick="selectColor('Silver', this)"></span>
                        </div>
                    </div>

                    <!-- Quantité -->
                    <div class="bijou-quantity">
                        <label for="quantity">Quantité :</label>
                        <div class="bijou-quantity-selector">
                            <button type="button" class="bijou-quantity-btn" onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" name="affiche_quantite" value="1" min="1">                            
                            <button type="button" class="bijou-quantity-btn" onclick="increaseQuantity()">+</button>
                        </div>
                    </div>

                    <!-- Champs cachés -->
                    <input type="hidden" name="produit_id" value="<?= $produit->id ?>">
                    <input type="hidden" name="nom" value="<?= htmlspecialchars($produit->specific_name) ?>">
                    <input type="hidden" name="prix" value="<?= htmlspecialchars($produit->prix) ?>">
                    <input type="hidden" name="couleur" id="selectedColorInput" value="Gold">
                    <input type="hidden" name="quantite" id="quantiteInput" value="1">

                    <!-- Bouton -->
                    <button type="submit" class="btn btn-primary">Ajouter au panier</button>
                </form>

                <p class="bijou-status">
                    <span class="bijou-status-icon">✔️</span> En stock (<?= $produit->stock ?> disponible<?= $produit->stock > 1 ? 's' : '' ?>)
                </p>

            <?php else: ?>
                <p class="bijou-status" style="color: red;">
                    <span class="bijou-status-icon">❌</span> Rupture de stock
                </p>
            <?php endif; ?>
            <div class="bijou-payment-info">
                <p>Le paiement est sécurisé par 
                    <a href="https://www.paypal.com/fr/webapps/mpp/paypal-secured" target="_blank">PayPal</a>.
                </p>
            </div>
        </div>
    </div>

    <!-- Description -->
    <section class="bijou-description">
        <h2>À propos de ce bijou</h2>
        <p><?= htmlspecialchars($produit->description) ?></p>
    </section>
</main>

<script>
    function changeImage(thumbnail) {
        document.getElementById("mainImage").src = thumbnail.src;
    }

    function selectColor(color, element) {
        document.getElementById("selectedColor").innerText = color;
        document.getElementById("selectedColorInput").value = color;

        document.querySelectorAll(".bijou-color").forEach(c => c.classList.remove("selected"));
        element.classList.add("selected");
    }

    function increaseQuantity() {
        let quantityInput = document.getElementById("quantity");
        let hiddenQuantity = document.getElementById("quantiteInput");

        quantityInput.value = parseInt(quantityInput.value) + 1;
        hiddenQuantity.value = quantityInput.value;
    }

    function decreaseQuantity() {
        let quantityInput = document.getElementById("quantity");
        let hiddenQuantity = document.getElementById("quantiteInput");

        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            hiddenQuantity.value = quantityInput.value;
        }
    }
</script>
