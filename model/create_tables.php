<?php
include 'connexion_db.php';

try {
    // Table des utilisateurs (clients)
    $sqlUser = "CREATE TABLE IF NOT EXISTS user_lp (
        id_user SERIAL PRIMARY KEY,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        email VARCHAR(150) UNIQUE NOT NULL,
        mot_de_passe VARCHAR(255) NOT NULL,
        telephone VARCHAR(20) NOT NULL,
        role VARCHAR(50) DEFAULT 'client' CHECK (role IN ('client', 'admin'))
    )";
    $pdo->exec($sqlUser);

    // Table des produits (bijoux)
    $sqlProduit = "CREATE TABLE IF NOT EXISTS produit_lp (
        id_produit SERIAL PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        prix DECIMAL(10,2) NOT NULL,
        stock INT DEFAULT 0,
        image VARCHAR(255),
        categorie VARCHAR(100) NOT NULL
    )";
    $pdo->exec($sqlProduit);

    // Table des commandes
    $sqlCommande = "CREATE TABLE IF NOT EXISTS commande_lp (
        id_commande SERIAL PRIMARY KEY,
        id_user INT REFERENCES user_lp(id_user) ON DELETE CASCADE,
        date_commande TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        statut VARCHAR(50) DEFAULT 'En attente' CHECK (statut IN ('En attente', 'Validée', 'Expédiée', 'Livrée', 'Annulée'))
    )";
    $pdo->exec($sqlCommande);

    // Table des détails des commandes (produits commandés)
    $sqlDetailsCommande = "CREATE TABLE IF NOT EXISTS details_commande_lp (
        id_detail SERIAL PRIMARY KEY,
        id_commande INT REFERENCES commande_lp(id_commande) ON DELETE CASCADE,
        id_produit INT REFERENCES produit_lp(id_produit) ON DELETE CASCADE,
        quantite INT NOT NULL CHECK (quantite > 0),
        prix_unitaire DECIMAL(10,2) NOT NULL
    )";
    $pdo->exec($sqlDetailsCommande);

    // Table des paiements
    $sqlPaiement = "CREATE TABLE IF NOT EXISTS paiement_lp (
        id_paiement SERIAL PRIMARY KEY,
        id_commande INT REFERENCES commande_lp(id_commande) ON DELETE CASCADE,
        montant DECIMAL(10,2) NOT NULL,
        date_paiement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        methode_paiement VARCHAR(50) CHECK (methode_paiement IN ('Carte bancaire', 'PayPal', 'Virement'))
    )";
    $pdo->exec($sqlPaiement);

    // Table des avis des clients
    $sqlAvis = "CREATE TABLE IF NOT EXISTS avis_lp (
        id_avis SERIAL PRIMARY KEY,
        id_user INT REFERENCES user_lp(id_user) ON DELETE CASCADE,
        id_produit INT REFERENCES produit_lp(id_produit) ON DELETE CASCADE,
        note INT CHECK (note BETWEEN 1 AND 5),
        commentaire TEXT,
        date_avis TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sqlAvis);

    echo "✅ Toutes les tables ont été créées avec succès !";

} catch (PDOException $e) {
    echo "❌ Erreur lors de la création des tables : " . $e->getMessage();
}
?>