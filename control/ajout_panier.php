<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $couleur = $_POST['couleur'];

    // Récupération du panier depuis un cookie
    $panier = isset($_COOKIE['panier']) ? json_decode($_COOKIE['panier'], true) : [];

    // Vérifier si le produit est déjà dans le panier
    $found = false;
    foreach ($panier as &$produit) {
        if ($produit['nom'] == $nom && $produit['couleur'] == $couleur) {
            $produit['quantite'] += $quantite;
            $found = true;
            break;
        }
    }

    // Si le produit n'existe pas encore, l'ajouter
    if (!$found) {
        $panier[] = [
            "nom" => $nom,
            "prix" => $prix,
            "quantite" => $quantite,
            "couleur" => $couleur
        ];
    }

}
?>