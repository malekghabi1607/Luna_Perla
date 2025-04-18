<?php
/**
 * @file ajout_panier.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Ce fichier permet d'ajouter un produit au panier depuis une page produit.
 * Il gère les utilisateurs connectés ou non, et stocke en base ou cookie.
 */
session_start();
// admin/control/ajout_produit.php
$racine_path = '../../';  
$racine_path1 = '../'; 

require_once($racine_path . 'utils/csrf.php');
$csrf_token = generate_csrf_token();

$titre = 'Ajouter un produit';

require_once($racine_path . "model/Produit_lp.php");
require_once($racine_path . "model/BaseProduit_lp.php");
require_once($racine_path . "class/Produit_lp.php");
require_once($racine_path . "class/BaseProduit_lp.php");

use classe\Produit_lp;
use classe\BaseProduit_lp;
use bd\Produit_lp as ProduitModel;
use bd\BaseProduit_lp as BaseProduitModel;

$base_url = "/~uapv2500231/Luna_Perla";

$message = "";

// Récupérer les bases de produit pour l'affichage du select
$baseProduitModel = new BaseProduitModel();
$baseProduits = $baseProduitModel->getAllBaseProduits();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        die("❌ Erreur CSRF : formulaire invalide.");
    }
    $produit = new Produit_lp();
    $produit->base_id = $_POST['base_id'];
    $produit->specific_name = $_POST['specific_name'];
    $produit->prix = $_POST['prix'];
    $produit->stock = $_POST['stock'];
    $produit->image = $_POST['image'];
    if (!isset($_POST['availability']) || !in_array($_POST['availability'], ['1', '0'])) {
        $message = "❌ Valeur de disponibilité invalide.";
    } else {
        $produit->availability = ($_POST['availability'] === '1');
    }
    $produit->description = $_POST['description'];

    $produitModel = new ProduitModel();
    $success = $produitModel->saveProduit($produit);

    if ($success) {
        header("Location: $base_url/admin/dashboard");
        exit;
    } else {
        $message = "❌ Erreur lors de l'ajout du produit.";
    }
}

include($racine_path1 . "templates/back/header.php");
include($racine_path1 . "templates/back/ajout_produit.php");
include($racine_path1 . "templates/back/footer.php");
