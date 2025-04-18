
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
                    <?php foreach ($panier as $index => $item): ?>
                        <?php
                        $produit = $item->produit;
                        $prix = floatval($produit->prix);
                        $quantite = intval($item->quantite);
                        $sous_total = $prix * $quantite;
                        ?>
                        <tr>
                            <td><?= htmlspecialchars($produit->specific_name) ?></td>
                            <td><?= number_format($prix, 2, ',', ' ') ?>€</td>
                            <td><?= $quantite ?></td>
                            <td><?= htmlspecialchars($item->couleur) ?></td>
                            <td><?= number_format($sous_total, 2, ',', ' ') ?>€</td>
                            <td>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a href="<?= $base_url ?>/supprimer_produit/<?= $item->produit_id ?>/<?= urlencode($item->couleur) ?>" class="remove-btn" onclick="return confirm('Supprimer ce produit ?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= $base_url ?>/supprimer-produit-cookie/<?= $index ?>" class="remove-btn" onclick="return confirm('Supprimer ce produit ?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                <?php endif; ?>                            
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-total">
                <p><strong>Total :</strong> <?= number_format($total, 2, ',', ' ') ?>€</p>
                <a href="<?= $base_url ?>/passer_commande" class="btn" onclick="return confirm('Passer la commande ?')">Passer la commande</a>
                <a href="<?= $base_url ?>/vider_panier" class="btn-clear" onclick="return confirm('Vider le panier ?')">Vider le panier</a>
            </div>
        <?php else: ?>
            <p class="empty-cart">Votre panier est vide. 🛒</p>
        <?php endif; ?>
    </div>
</main>