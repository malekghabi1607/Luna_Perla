<?php
/**
 * @file passer_commande.php
 * @version 1.1
 * @date 2025-04-08
 * @description 
 * Permet de valider la commande d’un utilisateur connecté.
 * Les produits du panier sont transférés en commande.
 */

session_start();
require_once('../model/ProduitUserPanier_lp.php');
use bd\ProduitUserPanier_lp;

$base_url = "/~uapv2500231/Luna_Perla";

// ✅ Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: $base_url/login");
    exit;
}

$user_id = $_SESSION['user_id'];
$model = new ProduitUserPanier_lp();

// ✅ Vérifie s'il y a des articles non vendus
$panier = $model->getPanierPourUtilisateur($user_id);
$hasArticles = false;

foreach ($panier as $item) {
    if (!$item->sold) {
        $hasArticles = true;
        break;
    }
}


if (!$hasArticles) {
    if ($canUseCookies) {
        setcookie('commande_success', 'vide2', time() + 5, '/');
    }
    header("Location: $base_url/panier");
    exit;
}

// ✅ Sinon, valider la commande
$success = $model->validerCommande($user_id);

    if ($success) {
        
        setcookie('commande_success', 'success', time() + 10, '/');
    } else {
        setcookie('commande_success', 'error', time() + 10, '/');
    }
    // Petit delay pour laisser le cookie s’installer (optionnel mais utile pour tester localement)
    sleep(1);

header("Location: $base_url/panier");
exit;

?>