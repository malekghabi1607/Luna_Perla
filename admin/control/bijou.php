<?php
/*
 * Fichier principal pour l'affichage de la fiche produit
 * Ce fichier inclut l'en-tête, définit les données du produit et affiche la fiche via l'inclusion d'un template,
 * puis inclut le pied de page.
 */

// Définition du chemin racine et du titre de la page
$racine_path = '../';
$titre = 'Détail du Produit';

// Inclusion de l'en-tête du back-office
include($racine_path . "templates/back/header.php");

// Ouverture de la balise <main> avec la classe CSS pour le détail du produit
echo '<main class="product-detail-container">';

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

// Inclusion du fichier de la fiche produit (dashboard)
include($racine_path . "templates/back/fiche_dashboard.php");

// Fermeture de la balise <main>
echo '</main>';

// Inclusion du pied de page du back-office
include($racine_path . "templates/back/footer.php");
?>