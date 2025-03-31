<?php
namespace bd;

use \PDO;
require('../class/ProduitUserPanier_lp.php');
require('GestionBD.php');

use bd\GestionBD;

class ProduitUserPanier_lp {

    /**
     * Get all products that are still in the user's cart (not yet purchased)
     */
    public function getProduitsDansPanier($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.specific_name, p.prix, p.stock, p.image, pup.date_sold 
                FROM produit_user_panier_lp pup
                JOIN produit_lp p ON pup.produit_id = p.id
                WHERE pup.user_id = :user_id AND pup.sold = FALSE";
                
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':user_id', $user_id);
        $stat->setFetchMode(PDO::FETCH_ASSOC);
        $stat->execute();
        $produitsPanier = $stat->fetchAll();

        $BD->deconnexion();
        return $produitsPanier;
    }

    /**
     * Get all products that the user has already bought
     */
    public function getProduitsAchetes($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.specific_name, p.prix, p.image, pup.date_sold 
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
}
?>