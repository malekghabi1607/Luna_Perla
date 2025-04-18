<?php
/**
 * @file panier.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Affiche les produits ajoutés au panier.
 * Permet modification, suppression et passage à la commande.
 */

 session_start();
$titre = 'Votre Panier';
$racine_path = '../';

require_once($racine_path . "model/ProduitUserPanier_lp.php");

use bd\ProduitUserPanier_lp as ProduitPanierModel;
use classe\ProduitUserPanier_lp as ProduitPanierData;
use classe\Produit_lp;

$base_url = "/~uapv2500231/Luna_Perla";

include($racine_path . 'templates/front/header.php');

$panier = [];
$model = new ProduitPanierModel();

if (isset($_COOKIE['commande_success']) && $_COOKIE['commande_success'] === 'success') {
    echo "<script>alert('Commande passé!');</script>";

    setcookie('commande_success', '', time() - 3600, '/');

} elseif (isset($_COOKIE['commande_success']) && $_COOKIE['commande_success'] === 'vide') {
    echo "<script>alert('panier vider réussi !');</script>";

    setcookie('commande_success', '', time() - 3600, '/');
} elseif (isset($_COOKIE['commande_success']) && $_COOKIE['commande_success'] === 'vide2') {
    echo "<script>alert('panier est vide !');</script>";

    setcookie('commande_success', '', time() - 3600, '/');
}

// ===========================
//  UTILISATEUR CONNECTÉ
// ===========================
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $panier = $model->getPanierPourUtilisateur($user_id);

// ===========================
// UTILISATEUR INVITÉ (COOKIE) + a accepté les cookies
// ===========================
} elseif (
    isset($_COOKIE['accept_cookie']) && $_COOKIE['accept_cookie'] === 'true' &&
    isset($_COOKIE['panier']) && $_COOKIE['panier'] !== ''
) {
    $panierCookie = json_decode($_COOKIE['panier'], true);

    foreach ($panierCookie as $index => $item) {
        $produit = new Produit_lp();
        $produit->id = $item['produit_id'] ?? null;
        $produit->specific_name = $item['specific_name'] ?? '';
        $produit->prix = $item['prix'] ?? 0;

        $panierItem = new ProduitPanierData();
        $panierItem->produit_id = $item['produit_id'];
        $panierItem->quantite = $item['quantite'];
        $panierItem->couleur = $item['couleur'];
        $panierItem->produit = $produit;

        $panier[] = $panierItem;
    }
} else {
    echo "<script>alert('cookies pas accepté, log in pour ajouter des produits');</script>";

}

// ===========================
// CALCUL TOTAL
// ===========================
$total = 0;
foreach ($panier as $produitPanier) {
    $produit = $produitPanier->produit;
    $total += floatval($produit->prix) * intval($produitPanier->quantite);
}

include($racine_path . 'templates/front/panier.php');
include($racine_path . 'templates/front/footer.php');
?>