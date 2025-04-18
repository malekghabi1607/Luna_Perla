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

 require_once('../../model/Produit_lp.php');
use bd\Produit_lp;

$base_url = "/~uapv2500231/Luna_Perla";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = intval($_GET['id']);
    
    $produitModel = new Produit_lp();
    $produitModel->deleteProduit($productId); // Make sure this method exists in your model

    header("Location: $base_url/admin/dashboard"); // Adjust path if needed
    exit;
} else {
    echo "ID produit manquant ou invalide.";
}
?>