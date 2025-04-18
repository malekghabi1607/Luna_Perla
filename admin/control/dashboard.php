<?php

$racine_path = '../';
$racine_path1 = '../../';

$titre = 'Dashboard - Produits et Utilisateurs';

session_start(); 

$base_url = "/~uapv2500231/Luna_Perla";


if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('❌ Vous n\'êtes pas connecté en tant qu\'administrateur.'); </script>";

    header("Location: $base_url/admin");
    exit;
}



include($racine_path . "templates/back/header.php");
echo '<main class="padding_dashboard">';

// ✅ Inclure les modèles nécessaires
require_once($racine_path1 . "model/Produit_lp.php");
require_once($racine_path1 . "model/User_lp.php");

use bd\Produit_lp as ProduitModel;
use bd\User_lp as UserModel;

// ✅ Récupération des produits
$produitModel = new ProduitModel();
$products = $produitModel->getAllProduits(); // ➤ renvoie un tableau d'objets Produit_lp

// ✅ Récupération des utilisateurs
$userModel = new UserModel();
$users = $userModel->getAllUsers(); // ➤ à créer si elle n'existe pas encore (similaire à getAllProduits)


// ✅ Affichage des données
include($racine_path . "templates/back/carte_dashboard.php");

echo '</main>';
include($racine_path . "templates/back/footer.php");
?>