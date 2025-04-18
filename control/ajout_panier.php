<?php
session_start();

require_once('../model/ProduitUserPanier_lp.php');
require_once('../class/ProduitUserPanier_lp.php');
require_once('../class/Produit_lp.php');

use bd\ProduitUserPanier_lp as ProduitPanierModel;
use classe\ProduitUserPanier_lp as ProduitPanierData;
use classe\Produit_lp;

$base_url = "/~uapv2500231/Luna_Perla";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $produit_id = (int)$_POST['produit_id'];
    $nom        = $_POST['nom'];
    $prix       = $_POST['prix'];
    $quantite   = (int)$_POST['quantite'];
    $couleur    = $_POST['couleur'];

    // ✅ Utilisateur connecté → panier BDD
    if (isset($_SESSION['user_id'])) {
        $model = new ProduitPanierModel();
        $model->ajouterProduitAuPanier($_SESSION['user_id'], $produit_id, $quantite, $couleur);
    } else {
        // 🔴 Utilisateur non connecté → panier cookie
        $panierCookie = isset($_COOKIE['panier']) ? json_decode($_COOKIE['panier'], true) : [];
        $panier = [];
        $found = false;

        foreach ($panierCookie as $item) {
            $produit = new Produit_lp();
            $produit->id = $item['produit_id'] ?? null;
            $produit->specific_name = $item['specific_name'] ?? '';
            $produit->prix = $item['prix'] ?? 0;

            $panierItem = new ProduitPanierData();
            $panierItem->produit = $produit;
            $panierItem->produit_id = $produit->id;
            $panierItem->quantite = $item['quantite'] ?? 1;
            $panierItem->couleur = $item['couleur'] ?? '';

            if ($produit->id == $produit_id && $panierItem->couleur === $couleur) {
                $panierItem->quantite += $quantite;
                $found = true;
            }

            $panier[] = $panierItem;
        }

        if (!$found) {
            $produit = new Produit_lp();
            $produit->id = $produit_id;
            $produit->specific_name = $nom;
            $produit->prix = $prix;

            $panierItem = new ProduitPanierData();
            $panierItem->produit = $produit;
            $panierItem->produit_id = $produit_id;
            $panierItem->quantite = $quantite;
            $panierItem->couleur = $couleur;

            $panier[] = $panierItem;
        }

        $cookieArray = array_map(function($item) {
            return [
                'produit_id'     => $item->produit_id,
                'specific_name'  => $item->produit->specific_name,
                'prix'           => $item->produit->prix,
                'quantite'       => $item->quantite,
                'couleur'        => $item->couleur
            ];
        }, $panier);

        setcookie('panier', json_encode($cookieArray), time() + 3600, '/');
    }

    // ✅ Redirection vers page panier via URL Rewriting
    header("Location: $base_url/panier");
    exit;
}