<?php
$racine_path = '../';
$titre = 'Dashboard - Produits et Utilisateurs';

include($racine_path . "templates/back/header.php");
echo '<main class="padding_dashboard">';

// Connexion à la BDD
require_once($racine_path . "model/GestionBD.php");
require_once($racine_path . "model/Produit_lp.php");
require_once($racine_path . "model/User_lp.php");

use bd\GestionBD;
use classe\Produit_lp;
use classe\User_lp;

$gestion = new GestionBD(); // ✅ Maintenant ça fonctionne
$pdo = $gestion->getPDO();



//1ere partie 
/*
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
*/



// 2eme partie


// ✅ Connexion via l’objet
$gestion = new GestionBD();
$pdo = $gestion->getPDO();

// ✅ Récupération des données produits (méthode à créer dans GestionBD)
$stmt1 = $pdo->query("SELECT * FROM produit_lp");
$products = $stmt1->fetchAll(\PDO::FETCH_ASSOC);

// ✅ Récupération des utilisateurs (méthode à créer dans GestionBD)
$stmt2 = $pdo->query("SELECT * FROM utilisateurs");
$users = $stmt2->fetchAll(\PDO::FETCH_ASSOC);




// Inclusion du template pour l'affichage de la fiche produit
include($racine_path . "templates/back/product.php");

// Inclusion du template pour l'affichage du dashboard (cartes, tableaux, etc.)
include($racine_path . "templates/back/carte_dashboard.php");

// Fermeture de la balise <main>
echo '</main>';

// Inclusion du pied de page du back-office
include($racine_path . "templates/back/footer.php");
?>
