<?php
/**
 * @file vider_panier.php
 * @version 1.0
 * @date 2025-04-07
 * @description 
 * Vide totalement le panier de l'utilisateur connecté.
 * Cette action supprime tous les produits associés au panier utilisateur en base.
 * 
 * Fonctionnalités :
 * - Vérifie la session utilisateur
 * - Supprime tous les produits liés au panier en base
 * - Redirige vers la page du panier vide
 */

 session_start();
require_once('../model/ProduitUserPanier_lp.php');
use bd\ProduitUserPanier_lp;

$base_url = "/~uapv2500231/Luna_Perla";


// Si utilisateur connecté → vider en base
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $model = new ProduitUserPanier_lp();
    $success = $model->viderPanier($user_id);

    if ($success) {
        setcookie('commande_success', 'vide', time() + 5, '/');
    } else {
        setcookie('commande_success', 'error', time() + 5, '/');
    }

} else {
    // Sinon → vider le cookie du panier
    if (isset($_COOKIE['panier'])) {
        setcookie('panier', '', time() - 3600, '/'); // Expire immédiatement
        setcookie('commande_success', 'vide', time() + 5, '/');
    } else {
        setcookie('commande_success', 'error', time() + 5, '/');
    }
}

// ✅ Redirection vers la page panier
header("Location: $base_url/panier");
exit;
?>