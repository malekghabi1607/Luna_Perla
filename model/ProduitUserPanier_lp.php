<?php
namespace bd;

use PDO;
require_once('../class/ProduitUserPanier_lp.php');
require_once('../class/Produit_lp.php');
require_once('GestionBD.php');

use bd\ProduitUserPanier_lp as ProduitPanierModel;
use classe\ProduitUserPanier_lp as ProduitPanierData;
use classe\Produit_lp;
use bd\GestionBD;

class ProduitUserPanier_lp {

    public function getPanierPourUtilisateur($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.*, pup.quantite, pup.couleur, pup.date_sold, pup.sold
                FROM produit_user_panier_lp pup
                JOIN produit_lp p ON pup.produit_id = p.id
                WHERE pup.user_id = :user_id AND pup.sold = FALSE";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $BD->deconnexion();

        $panier = [];
        foreach ($rows as $row) {
            $produit = new Produit_lp(); // Create empty object

            $produit->id = $row['id'];
            $produit->specific_name = $row['specific_name'];
            $produit->prix = $row['prix'];
            $produit->stock = $row['stock'];
            $produit->image = $row['image'];

            $produitPanier = new ProduitPanierData();

            $produitPanier->produit_id = $row['id'];
            $produitPanier->user_id = $user_id;
            $produitPanier->date_sold = $row['date_sold'];
            $produitPanier->sold = $row['sold'];
            $produitPanier->quantite = $row['quantite'];
            $produitPanier->couleur = $row['couleur'];
            $produitPanier->produit = $produit;

            $panier[] = $produitPanier;
        }

        return $panier;
    }

    public function supprimerProduit($user_id, $produit_id, $couleur) {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "DELETE FROM produit_user_panier_lp 
                WHERE user_id = :user_id AND produit_id = :produit_id AND couleur = :couleur AND sold = FALSE";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':produit_id' => $produit_id,
            ':couleur' => $couleur
        ]);
    
        $BD->deconnexion();
    }

    public function validerCommande($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE produit_user_panier_lp 
                SET sold = TRUE, date_sold = NOW()
                WHERE user_id = :user_id AND sold = FALSE";

        $stmt = $BD->pdo->prepare($sql);
        $success = $stmt->execute([':user_id' => $user_id]);

        $BD->deconnexion();
        return $success;
    }
    
    public function viderPanier($user_id) {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "DELETE FROM produit_user_panier_lp WHERE user_id = :user_id AND sold = FALSE";
        $stmt = $BD->pdo->prepare($sql);
        $success = $stmt->execute([':user_id' => $user_id]);
    
        $BD->deconnexion();
        return $success;
    }

    /**
     * Récupère tous les produits déjà achetés
     */
    public function getProduitsAchetes($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.specific_name, p.prix, p.image, pup.date_sold, pup.quantite, pup.couleur
                FROM produit_user_panier_lp pup
                JOIN produit_lp p ON pup.produit_id = p.id
                WHERE pup.user_id = :user_id AND pup.sold = TRUE";

        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':user_id', $user_id);
        $stat->setFetchMode(PDO::FETCH_ASSOC);
        $stat->execute();
        $produitsAchetes = $stat->fetchAll();

        $BD->deconnexion();
        return $produitsAchetes;
    }

    public function ajouterProduitAuPanier($user_id, $produit_id, $quantite, $couleur) {
        $BD = new GestionBD();
        $BD->connexion();
    
        // Vérifier si l'entrée existe déjà (même produit, même utilisateur, même couleur)
        $sql = "SELECT * FROM produit_user_panier_lp 
                WHERE user_id = :user_id AND produit_id = :produit_id AND couleur = :couleur";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':produit_id' => $produit_id,
            ':couleur' => $couleur
        ]);
    
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($existing) {
            if ($existing['sold']) {
                // ✅ Produit déjà vendu, on réactive
                $sql = "UPDATE produit_user_panier_lp 
                        SET quantite = :quantite, sold = false 
                        WHERE user_id = :user_id AND produit_id = :produit_id AND couleur = :couleur";
            } else {
                // ✅ Produit déjà dans le panier actif : augmenter la quantité
                $sql = "UPDATE produit_user_panier_lp 
                        SET quantite = quantite + :quantite 
                        WHERE user_id = :user_id AND produit_id = :produit_id AND couleur = :couleur";
            }
    
            $stmt = $BD->pdo->prepare($sql);
            return $stmt->execute([
                ':quantite' => $quantite,
                ':user_id' => $user_id,
                ':produit_id' => $produit_id,
                ':couleur' => $couleur
            ]);
        }
    
        // ✅ Aucun doublon, insertion normale
        $sql = "INSERT INTO produit_user_panier_lp (user_id, produit_id, quantite, couleur, sold, date_sold)
                VALUES (:user_id, :produit_id, :quantite, :couleur, false, NULL)";
        $stmt = $BD->pdo->prepare($sql);
        return $stmt->execute([
            ':user_id' => $user_id,
            ':produit_id' => $produit_id,
            ':quantite' => $quantite,
            ':couleur' => $couleur
        ]);
    }
}
?>