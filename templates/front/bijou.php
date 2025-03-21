<main class="bijou-page-container">
    <div class="bijou-page">

        <!-- Partie gauche : galerie d'images -->
        <div class="bijou-gallery">
            <div class="bijou-main-image">
                <img id="mainImage" src="<?php echo $racine_path . "templates/front/" . $bijou['images'][0]; ?>"
                    alt="<?php echo htmlspecialchars($bijou['name']); ?>">
            </div>
            <div class="bijou-thumbnails">
                <?php foreach ($bijou['images'] as $index => $image): ?>
                    <img class="thumbnail" src="<?php echo $racine_path . "templates/front/" . $image; ?>"
                        alt="Miniature <?php echo $index + 1; ?>" onclick="changeImage(this)">
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Partie droite : informations produit -->
        <div class="bijou-info">
            <h1><?php echo htmlspecialchars($bijou['name']); ?></h1>
            <p class="bijou-price"><?php echo $bijou['price']; ?></p>

            <!-- Options de couleur -->
            <div class="bijou-options">
                <p><strong>Couleur :</strong> <span id="selectedColor">Gold</span></p>
                <div class="bijou-color-options">
                    <span class="bijou-color gold selected" onclick="selectColor('Gold', this)"></span>
                    <span class="bijou-color silver" onclick="selectColor('Silver', this)"></span>
                </div>
            </div>

            <!-- Sélection de quantité -->
            <div class="bijou-quantity">
                <label for="quantity">Quantité :</label>
                <div class="bijou-quantity-selector">
                    <button type="button" class="bijou-quantity-btn" onclick="decreaseQuantity()">-</button>
                    <input type="number" id="quantity" value="1" min="1">
                    <button type="button" class="bijou-quantity-btn" onclick="increaseQuantity()">+</button>
                </div>
            </div>

            <!-- Bouton d'ajout au panier -->
            <form action="ajout_panier.php" method="POST">
                <input type="hidden" name="nom" value="<?php echo htmlspecialchars($bijou['name']); ?>">
                <input type="hidden" name="prix" value="<?php echo $bijou['price']; ?>">
                <input type="hidden" name="couleur" id="selectedColorInput" value="Gold">
                <input type="hidden" name="quantite" id="quantiteInput" value="1">
            </form>
            

            <p class="bijou-status"><span class="bijou-status-icon">✔️</span> En stock</p>

            <div class="bijou-payment-info">
                <p>Le paiement est sécurisé par <a href="https://www.paypal.com/fr/webapps/mpp/paypal-secured"
                        target="_blank">PayPal</a>.</p>
            </div>
        </div>
    </div>

    <!-- Description détaillée -->
    <section class="bijou-description">
        <h2>À propos de ce bijou</h2>
        <p><?php echo htmlspecialchars($bijou['description']); ?></p>
    </section>
</main>

<script>
    // Changer l'image principale
    function changeImage(thumbnail) {
        document.getElementById("mainImage").src = thumbnail.src;
    }

    // Sélectionner la couleur
    function selectColor(color, element) {
        document.getElementById("selectedColor").innerText = color;
        document.getElementById("selectedColorInput").value = color;

        document.querySelectorAll(".bijou-color").forEach(c => c.classList.remove("selected"));
        element.classList.add("selected");
    }

    // Augmenter la quantité
    function increaseQuantity() {
        let quantityInput = document.getElementById("quantity");
        let hiddenQuantity = document.getElementById("quantiteInput");

        quantityInput.value = parseInt(quantityInput.value) + 1;
        hiddenQuantity.value = quantityInput.value;
    }

    // Diminuer la quantité
    function decreaseQuantity() {
        let quantityInput = document.getElementById("quantity");
        let hiddenQuantity = document.getElementById("quantiteInput");

        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            hiddenQuantity.value = quantityInput.value;
        }
    }
</script>