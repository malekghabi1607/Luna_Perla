<?php
$racine_path = '../';
$titre = 'Collection';

// 1ere partie du projet
/*
// Définition de la liste des produits
$products = [
    ["id" => 1, "name" => "Collier Sautoir - JOANA", "price" => "26", "image" => "images/collier-joana-1.jpg"],
    ["id" => 2, "name" => "Bague - INES", "price" => "19", "image" => "images/bague-ines-1.jpg"],


];
*/

// 2eme partie du projet
// On inclut le modèle
include($racine_path . "templates/front/header.php");
echo '<main>
    <section class="collection-container">
    <div class="product-grid">';

require($racine_path . 'model/Produit_lp.php');
require($racine_path . 'model/Images_lp.php');
use bd\Produit_lp;
use bd\ImagesProduitLP;

$produitBD = new Produit_lp();
foreach ($produitBD->listProduits() as $produit) {
    $images=new ImagesProduitLP();
    $id_produit = $produit->id;
    $tableauimages=$images->fetchByProduitId($id_produit);
    $nom_produit = $produit->specific_name;
    $prix_produit = $produit->prix;
    $stock_produit = $produit->stock;
    $disponibilite_produit = $produit->availability ? "En stock" : "Rupture";
    $lien_fiche_produit = $racine_path . "control/bijou.php?id=$id_produit";
    include($racine_path . "templates/front/carte_produit.php");
}
echo '  </div>
</section>
</main>
';
include($racine_path . "templates/front/footer.php");
?>