<?php
include 'connexion_db.php';

try {
    // ==========================
    // 1) TABLE Person_lp (classe parente)
    // ==========================
    $sqlPerson = "CREATE TABLE IF NOT EXISTS person_lp (
        id SERIAL PRIMARY KEY,
        username VARCHAR(100) UNIQUE NOT NULL,
        password_hash TEXT NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL
    )";
    $pdo->exec($sqlPerson);

    // ==========================
    // 2) TABLE User_lp (hérite de Person_lp)
    // ==========================
    $sqlUser = "CREATE TABLE IF NOT EXISTS user_lp (
        user_id INT PRIMARY KEY REFERENCES person_lp(id) ON DELETE CASCADE,
        phone VARCHAR(20),
        shipping_address TEXT
    )";
    $pdo->exec($sqlUser);

    // ==========================
    // 3) TABLE Admin_lp (hérite de Person_lp)
    // ==========================
    $sqlAdmin = "CREATE TABLE IF NOT EXISTS admin_lp (
        admin_id INT PRIMARY KEY REFERENCES person_lp(id) ON DELETE CASCADE,
        permissions TEXT NOT NULL,
        department TEXT NOT NULL
    )";
    $pdo->exec($sqlAdmin);

    // ==========================
    // 4) TABLE Contact_lp (référence User_lp)
    // ==========================
    $sqlContact = "CREATE TABLE IF NOT EXISTS contact_lp (
        id SERIAL PRIMARY KEY,
        user_id INT NOT NULL REFERENCES user_lp(user_id) ON DELETE CASCADE,
        sujet VARCHAR(255) NOT NULL,
        message TEXT,
        date_envoi TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sqlContact);

    // ==========================
    // 5) TABLE Collection_lp (Stores Product Collections) ✅ FIXED ORDER
    // ==========================
    $sqlCollection = "CREATE TABLE IF NOT EXISTS collection_lp (
        id SERIAL PRIMARY KEY,
        collection_name VARCHAR(255) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sqlCollection);

    // ==========================
    // 6) TABLE BaseProduit_lp (Common Product Attributes)
    // ==========================
    $sqlBaseProduit = "CREATE TABLE IF NOT EXISTS base_produit_lp (
        id SERIAL PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        multicolor BOOLEAN DEFAULT FALSE,
        description TEXT
    )";
    $pdo->exec($sqlBaseProduit);

    // ==========================
    // 7) TABLE Produit_lp (Specific Product - Inherits from BaseProduit_lp)
    // ==========================
    $sqlProduit = "CREATE TABLE IF NOT EXISTS produit_lp (
        id SERIAL PRIMARY KEY,
        base_id INT NOT NULL REFERENCES base_produit_lp(id) ON DELETE CASCADE, -- ✅ FIXED CASCADE DELETE
        collection_id INT REFERENCES collection_lp(id) ON DELETE CASCADE, -- ✅ FIXED CASCADE DELETE
        specific_name VARCHAR(255),
        prix DECIMAL(10,2) NOT NULL CHECK (prix > 0),
        stock INT DEFAULT 0 CHECK (stock >= 0),
        image BYTEA, -- ✅ Consider changing this to VARCHAR(255) for file path storage
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        availability BOOLEAN DEFAULT TRUE
    )";
    $pdo->exec($sqlProduit);

    // ==========================
    // 8) TABLE Produit_user_panier_lp (liaison Produit_lp et User_lp) ✅ FIXED VARIABLE NAME
    // ==========================
    $sqlProduitUserPanier = "CREATE TABLE IF NOT EXISTS produit_user_panier_lp (
        produit_id INT NOT NULL REFERENCES produit_lp(id) ON DELETE CASCADE,
        user_id INT NOT NULL REFERENCES user_lp(user_id) ON DELETE CASCADE,
        date_sold TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        sold BOOLEAN DEFAULT FALSE,
        PRIMARY KEY (produit_id, user_id)
    )";
    $pdo->exec($sqlProduitUserPanier); // ✅ FIXED VARIABLE NAME

    echo "✅ Toutes les tables ont été créées avec succès !";

} catch (PDOException $e) {
    echo "❌ Erreur lors de la création des tables : " . $e->getMessage();
}
?>