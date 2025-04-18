<main>
    <div class="welcome-container">
        <h1>Bienvenue sur votre espace personnel</h1>

        <?php if (isset($infos)): ?>
            <h2>Bienvenue, <?= htmlspecialchars($infos->__get('username')) ?> !</h2>
            <p><strong>Email :</strong> <?= htmlspecialchars($infos->__get('email')) ?></p>
            <p><strong>Téléphone :</strong> <?= htmlspecialchars($infos->__get('phone')) ?></p>
            <p><strong>Adresse de livraison :</strong> <?= htmlspecialchars($infos->__get('shipping_address')) ?></p>
        <?php else: ?>
            <p>Informations utilisateur indisponibles.</p>
        <?php endif; ?>

        <!-- Lien de déconnexion avec base_url -->
        <a href="<?= $base_url ?>/logout" class="btn">Se déconnecter</a>
    </div>
</main>