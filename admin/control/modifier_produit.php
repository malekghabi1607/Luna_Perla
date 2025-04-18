<?php
$racine_path = '../../';
$racine_path1 = '../';
$titre = 'Modifier un produit';

session_start(); 

require_once($racine_path . "utils/csrf.php");
$csrf_token = generate_csrf_token();

$base_url = "/~uapv2500231/Luna_Perla";

if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('❌ Vous n\'êtes pas connecté en tant qu\'administrateur.'); </script>";

    header("Location: $base_url/admin");
    exit;
}


require_once($racine_path . "model/Produit_lp.php");
require_once($racine_path . "class/Produit_lp.php");

use bd\Produit_lp as ProduitModel;
use classe\Produit_lp;

$model = new ProduitModel();
$message = "";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID produit invalide.");
}

$id = intval($_GET['id']);
$produit = $model->getProduitById($id); // ⚠️ Crée cette méthode dans ProduitModel

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        die("❌ Erreur CSRF : formulaire invalide.");
    }
    $produit->specific_name = $_POST['specific_name'];
    $produit->prix = $_POST['prix'];
    $produit->stock = $_POST['stock'];
    $produit->image = $_POST['image'];
    $produit->availability = $_POST['availability'];
    $produit->description = $_POST['description'];

    if ($model->modifierProduit($produit)) {
        header("Location: $base_url/admin/dashboard");
        exit;
    } else {
        $message = "❌ Erreur lors de la mise à jour.";
    }
}

include($racine_path1 . "templates/back/header.php");
include($racine_path1 . "templates/back/modifier_produit.php");
include($racine_path1 . "templates/back/footer.php");
?>