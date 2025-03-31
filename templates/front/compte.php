<main>
        <h2>Bienvenue, <?= htmlspecialchars($infos['prenom']) ?> <?= htmlspecialchars($infos['nom']) ?> !</h2>
        <p><strong>Email :</strong> <?= htmlspecialchars($infos['email']) ?></p>
        <p><strong>Téléphone :</strong> <?= htmlspecialchars($infos['telephone']) ?></p>
        <p><strong>Adresse de livraison :</strong> <?= htmlspecialchars($infos['adresse']) ?></p>

        <a href="../control/deconnexion.php" class="btn">Se déconnecter</a>
    </div>
</main>