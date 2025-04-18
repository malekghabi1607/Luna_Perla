<?php
// Définir l'URL de base si non encore défini
if (!isset($base_url)) {
    $base_url = "/~uapv2500231/Luna_Perla";
}
?>

<!-- 🏠 Logo du site -->
<div class="logo">
    <a class="navbar-brand" href="<?= $base_url ?>/">Luna Perla</a>
</div>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <!-- 🛠️ Bouton pour mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- 🌿 Menu principal -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/collection">Collection</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/notre-histoire">Notre Histoire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/soldes">Soldes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base_url ?>/best-sellers">Best Sellers</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- 🔍 Icônes à droite -->
<div class="d-flex align-items-center">
    <a href="<?= $base_url ?>/compte" class="nav-link">
        <i class="fas fa-user"></i>
    </a>
    <a href="<?= $base_url ?>/panier" class="nav-link">
        <i class="fas fa-shopping-bag"></i>
    </a>
</div>