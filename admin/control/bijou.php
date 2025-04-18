<?php
/**
 * @file best-sellers.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Affiche une sélection des produits les plus vendus.
 * Sert à mettre en avant les produits populaires auprès des utilisateurs.
 */

// Définition du chemin racine et du titre de la page
$racine_path = '../../';
$titre = 'Détail du Produit';

$base_url = "/~uapv2500231/Luna_Perla";


session_start();

// Inclusion de l'en-tête du back-office
include($racine_path . "templates/back/header.php");

// Ouverture de la balise <main> avec la classe CSS pour le détail du produit
echo '<main class="product-detail-container">';
/*
// Définition des données du produit sous forme de tableau associatif
$product = [
    'name'             => 'Collier Sautoir - JOANA',
    'price'            => '26,00€',
    'stock_status'     => '🔴 Plus que 3 produits en stock',
    'payment_info'     => 'ou 3 fois 8,66€ sans intérêt',
    'description_title'=> 'À propos de ce bijou',
    'description'      => [
        'Les colliers Luna Perla sont en acier inoxydable uniquement.',
        'Élabore tes propres combinaisons de bijoux Luna Perla pour créer ton style et enrichir tes tenues !',
        'Disponible en doré et argenté.'
    ],
    'specs'            => [
        ['Longueur de la chaîne', '80 cm'],
        ['Réglage de la chaîne', '5 cm']
    ],
    'main_image'       => $racine_path . 'templates/back/images/collier-joana-1.jpg',
    'main_image_alt'   => 'Bijou Principal'
];
*/


// On inclut le modèle
require($racine_path . 'model/Produit_lp.php');
require($racine_path . 'model/Images_lp.php');
use bd\Produit_lp; 
use bd\ImagesProduitLP;


// On crée un objet Produit pour accéder à la BDD
$produitBD = new Produit_lp();
$imagesBD = new ImagesProduitLP();
if (isset($_GET['id'])) {
    // Récupération du produit par son ID
    $produit = $produitBD->getProduitById($_GET['id']);

    if ($produit) {
        $id_produit = $produit->id;
        $nom_produit = $produit->specific_name;
        $prix_produit = $produit->prix;
        $stock_produit = $produit->stock;
        $description_produit = $produit->description;

        // ✅ Récupérer toutes les images associées au produit
        $autres_images = $imagesBD->fetchByProduitId($id_produit);

        // ✅ Vérification que l'objet existe et accès correct à la propriété
        if (!empty($autres_images) && isset($autres_images[0]->image_path)) {
            $image_produit = $racine_path . $autres_images[0]->image_path;
        } else {
            $image_produit = $racine_path . "images/default.jpg";
        }

        // ✅ Transformation correcte du tableau d'objets en chemins d'images
        $autres_images = array_map(function($img) use ($racine_path) {
            return $racine_path . $img->image_path;  // Accès correct à la propriété d'un objet
        }, $autres_images);
    } else {
        echo "Produit introuvable.";
        exit;
    }
}

// Inclusion du fichier de la fiche produit (dashboard)
include($racine_path . "templates/back/fiche_dashboard.php");

// Fermeture de la balise <main>
echo '</main>';

// Inclusion du pied de page du back-office
include($racine_path . "templates/back/footer.php");
?>
