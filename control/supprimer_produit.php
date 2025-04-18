<?php
/**
 * @file supprimer_produit.php
 * @version 1.0
 * @date 2025-04-07
 * @description 
 * Supprime un produit du panier pour un utilisateur connecté (en base de données).
 * Si l'utilisateur n'est pas connecté, il est redirigé.
 * 
 * Fonctionnalités :
 * - Vérifie l'identité de l'utilisateur via la session
 * - Supprime un produit du panier lié en base
 * - Redirige après suppression
 */

 session_start();

$racine_path = '../';
$base_url = "/~uapv2500231/Luna_Perla";

require_once($racine_path . 'model/ProduitUserPanier_lp.php');
use bd\ProduitUserPanier_lp;

if (!isset($_SESSION['user_id'])) {
    header("Location: $base_url/index.php");
    exit;
}

if (isset($_GET['produit_id']) && isset($_GET['couleur'])) {
    $user_id = $_SESSION['user_id'];
    $produit_id = intval($_GET['produit_id']);
    $couleur = $_GET['couleur'];

    $model = new ProduitUserPanier_lp();
    $success = $model->supprimerProduit($user_id, $produit_id, $couleur);

    header("Location: $base_url/panier");
    exit;
} else {
    echo "<p style='color:red; text-align:center;'>Paramètres manquants pour supprimer le produit.</p>";
}
?>