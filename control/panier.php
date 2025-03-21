<?php
$titre = 'Votre Panier';
$racine_path = '../'; // Adapter en fonction de l'organisation
include($racine_path . 'templates/front/header.php');

// Vérification si le panier existe via un cookie
$panier = isset($_COOKIE['panier']) ? json_decode($_COOKIE['panier'], true) : [];

// Gestion de la suppression d'un article
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $index = intval($_GET['remove']);
    if (isset($panier[$index])) {
        unset($panier[$index]);
        $panier = array_values($panier); // Réindexation
    }
    setcookie('panier', json_encode($panier), time() + 3600, '/');
    header("Location: panier.php");
    exit();
}

// Gestion du vidage complet du panier
if (isset($_GET['clear'])) {
    $panier = [];
    setcookie('panier', '', time() - 3600, '/');
    header("Location: panier.php");
    exit();
}

// Calcul du total du panier
$total = 0;
foreach ($panier as $produit) {
    if (isset($produit['prix'], $produit['quantite'])) {
        $prix = floatval($produit['prix']);
        $quantite = intval($produit['quantite']);
        $total += $prix * $quantite;
    }
}

include($racine_path . 'templates/front/panier.php');
include($racine_path . 'templates/front/footer.php');
?>