<?php
/**
 * @file collection.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Affiche toutes les collections disponibles sur Luna Perla.
 * Utilisée pour naviguer par gamme ou inspiration.
 */

 session_start();

$racine_path = '../';
$titre = 'Collection';

// 🔁 Inclusion du header
include($racine_path . "templates/front/header.php");

echo '<main>
    <section class="collection-container">
    <div class="product-grid">';

require($racine_path . 'model/Produit_lp.php');
require($racine_path . 'model/Images_lp.php');

use bd\Produit_lp;
use bd\ImagesProduitLP;

$base_url = "/~uapv2500231/Luna_Perla";

$produitBD = new Produit_lp();
$imagesBD = new ImagesProduitLP();

foreach ($produitBD->listProduits() as $produit) {
    $id_produit = $produit->id;
    $nom_produit = $produit->specific_name;
    $prix_produit = $produit->prix;
    $stock_produit = $produit->stock;
    $disponibilite_produit = $produit->availability ? "En stock" : "Rupture";

    $tableauimages = $imagesBD->fetchByProduitId($id_produit);
    
    // ✅ Utiliser URL Rewriting : /bijou-3
    $lien_fiche_produit = "$base_url/bijou-$id_produit";

    // 🔁 Inclure carte HTML
    include($racine_path . "templates/front/carte_produit.php");
}

echo '  </div>
</section>
</main>';

include($racine_path . "templates/front/footer.php");
?>