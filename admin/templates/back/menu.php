<!-- Contenu du menu, inclus dans le header -->

<!-- Section du logo du site -->
<div class="logo">
    <!-- Lien vers la page d'accueil avec le nom de la marque -->
    <a class="navbar-brand" href="<?php echo $racine_path.'control/accueil.php'; ?>">Luna Perla</a>
</div>

<!-- Menu de navigation principal -->
<ul class="navbar-nav">
    <li class="nav-item">
        <!-- Lien vers le dashboard (interface admin) -->
        <a class="nav-link" href="<?php echo $racine_path.'control/dashboard.php'; ?>"> Dashboard </a>
    </li>
</ul>

<!-- Section des icônes dans le header, alignées à droite -->
<div class="d-flex align-items-center">
    <!-- Lien vers la page de connexion avec l'icône utilisateur -->
    <a href="<?php echo $racine_path.'index.php'; ?>" class="nav-link">
        <i class="fas fa-user"></i>
    </a>
    <!-- Lien vide pour une éventuelle icône additionnelle -->
    <a>
        <i></i>
    </a>
</div>