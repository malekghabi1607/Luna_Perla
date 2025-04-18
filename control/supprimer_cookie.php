<?php
/**
 * @file supprimer_cookie.php
 * @version 1.0
 * @date 2025-04-07
 * @description 
 * Ce fichier gère la suppression d'un produit dans le panier client stocké en cookie.
 * Il supprime l'élément selon son index et redirige vers le panier.
 * 
 * Fonctionnalités :
 * - Récupération de l'index du produit à supprimer
 * - Mise à jour du cookie panier
 * - Redirection vers la page panier
 */

 session_start();

$base_url = "/~uapv2500231/Luna_Perla";

if (!isset($_GET['index']) || !is_numeric($_GET['index'])) {
    header("Location: $base_url/panier");
    exit;
}

$index = (int) $_GET['index'];

if (isset($_COOKIE['panier'])) {
    $panierCookie = json_decode($_COOKIE['panier'], true);

    if (isset($panierCookie[$index])) {
        unset($panierCookie[$index]);
        $panierCookie = array_values($panierCookie); // Réindexer le tableau
        setcookie('panier', json_encode($panierCookie), time() + 3600, "/");
    }
}

header("Location: $base_url/panier");
exit;