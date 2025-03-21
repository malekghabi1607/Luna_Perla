<main>
    <div class="cart-container">
        <h2 class="page-title">🛍️ Votre Panier</h2>

        <?php if (!empty($panier)): ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Couleur</th>
                        <th>Sous-total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($panier as $index => $produit):
                        $prix = floatval($produit['prix']);
                        $quantite = intval($produit['quantite']);
                        $sous_total = $prix * $quantite;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($produit['nom']); ?></td>
                            <td><?= number_format($prix, 2, ',', ' ') ?>€</td>
                            <td><?= $quantite; ?></td>
                            <td><?= htmlspecialchars($produit['couleur']); ?></td>
                            <td><?= number_format($sous_total, 2, ',', ' ') ?>€</td>
                            <td>
                                <a href="panier.php?remove=<?= $index; ?>" class="remove-btn"
                                    onclick="return confirm('Voulez-vous supprimer cet article ?');">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-total">
                <p><strong>Total :</strong> <?= number_format($total, 2, ',', ' ') ?>€</p>
                <a href="checkout.php" class="btn">Passer la commande</a>
                <a href="panier.php?clear=1" class="btn-clear"
                    onclick="return confirm('Êtes-vous sûr de vouloir vider votre panier ?');">Vider le panier</a>
            </div>
        <?php else: ?>
            <p class="empty-cart">Votre panier est vide. 🛒</p>
        <?php endif; ?>
    </div>
</main>