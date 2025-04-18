<main>
    <div class="welcome-container">
        <h1>Bienvenue sur votre espace personnel</h1>
        <h2>Admin, <?= htmlspecialchars($infos->__get('username')) ?> !</h2>
        <p><strong>Email :</strong> <?= htmlspecialchars($infos->__get('email')) ?></p>
        <p><strong>Permissions :</strong> <?= htmlspecialchars($infos->__get('permissions')) ?></p>
        <p><strong>Département :</strong> <?= htmlspecialchars($infos->__get('department')) ?></p>
        <a href="<?= $base_url ?>/admin/logout" class="btn">Se déconnecter</a>
    </div>
</main>