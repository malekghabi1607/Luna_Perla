<?php
/**
 * @file best-sellers.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Affiche une sélection des produits les plus vendus.
 * Sert à mettre en avant les produits populaires auprès des utilisateurs.
 */

 session_start();

$racine_path = '../';
$titre = 'Détail du bijou';

require($racine_path . 'model/Produit_lp.php');
require($racine_path . 'model/Images_lp.php');

use bd\Produit_lp; 
use bd\ImagesProduitLP;

$base_url = "/~uapv2500231/Luna_Perla";

// On crée un objet Produit pour accéder à la BDD
$produitBD = new Produit_lp();
$imagesBD = new ImagesProduitLP();

$id = null;

// ✅ Récupération de l'ID via URL Rewriting (ex: bijou-5)
if (isset($_SERVER['REQUEST_URI'])) {
    if (preg_match('#bijou-([0-9]+)$#', $_SERVER['REQUEST_URI'], $matches)) {
        $id = intval($matches[1]);
    }
}

if ($id !== null) {
    $produit = $produitBD->getProduitById($id);

    if ($produit) {
        $id_produit = $produit->id;
        // Récupérer les images associées
        $autres_images_raw = $imagesBD->fetchByProduitId($id_produit);

        $autres_images = array_map(function($img) use ($base_url) {
            return $base_url . '/' . ltrim($img->image_path, '/');
        }, $autres_images_raw);
        
        $image_produit = $autres_images[0] ?? "$base_url/images/produits/default.jpg";
    } else {
        echo "Produit introuvable.";
        exit;
    }
} else {
    echo "ID produit manquant.";
    exit;
}

// ➤ Affichage des templates
include($racine_path . "templates/front/header.php");
echo '<main>';
include($racine_path . "templates/front/bijou.php");
echo '</main>';
include($racine_path . "templates/front/footer.php");
?>