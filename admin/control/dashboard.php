<?php
/*
 * Fichier principal pour le dashboard (inclusion des éléments restants)
 * Ce fichier définit les données des produits et des utilisateurs, 
 * inclut l'en-tête, affiche le contenu principal via un template, 
 * et termine avec l'inclusion du pied de page.
 */

// Définition du chemin racine et du titre de la page
$racine_path = '../';
$titre = 'Dashboard - Produits et Utilisateurs';

// Inclusion de l'en-tête du back-office
include($racine_path . "templates/back/header.php");

// Ouverture de la balise <main> avec la classe CSS "padding_dashboard"
echo '<main class="padding_dashboard">';

// Définition des données des produits sous forme de tableau associatif
$products = [
    [
        'id' => 1,
        'image' => $racine_path . 'templates/back/images/bague-elegante.jpg',
        'name' => 'Bague Élégante',
        'price' => '19,99€',
        'stock' => 3,
        'details_link' => $racine_path . 'control/bijou.php'
    ],
    // Ajouter d'autres produits si nécessaire...
];

// Définition des données des utilisateurs sous forme de tableau associatif
$users = [
    [
        'id' => 1,
        'username' => 'JeanDupont',
        'email' => 'jean@example.com',
        'role' => 'Admin'
    ]
];

// Inclusion du template pour l'affichage du dashboard (cartes, tableaux, etc.)
include($racine_path . "templates/back/carte_dashboard.php");

// Fermeture de la balise <main>
echo '</main>';

// Inclusion du pied de page du back-office
include($racine_path . "templates/back/footer.php");
?>
