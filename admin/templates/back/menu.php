<!-- Contenu du menu, inclus dans le header -->

<!-- Section du logo du site -->
<div class="logo">
    <!-- Lien vers la page d'accueil avec le nom de la marque -->
    <?php
    $accueilPath = $base_url . '/admin/accueil' 
    ?>

    <a class="navbar-brand" href="<?= $accueilPath ?>">Luna Perla</a>
</div>

<!-- Menu de navigation principal -->
<ul class="navbar-nav">
    <li class="nav-item">
        <!-- Lien vers le dashboard (interface admin) -->

        <?php
        $path = $base_url . '/admin/dashboard'
        ?>
        <a class="nav-link" href="<?= $path ?>">Dashboard</a>    
    </li>
</ul>

<!-- Section des icônes dans le header, alignées à droite -->
<?php
$indexPath = $base_url . '/admin/account'
?>

<div class="d-flex align-items-center">
    <!-- Lien vers la page de connexion avec l'icône utilisateur -->
    <a href="<?= $indexPath ?>" class="nav-link">
        <i class="fas fa-user"></i>
    </a>
    <!-- Lien vide pour une éventuelle icône additionnelle -->
    <a>
        <i></i>
    </a>
</div>