<?php
namespace classe;

use \PDO;
require_once(__DIR__ . '/../../model/GestionBD.php');


use bd\GestionBD;

class Produit_lp {

    public function saveProduit($produit) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "INSERT INTO produit_lp (base_id, collection_id, specific_name, prix, stock, image, availability) 
                VALUES (:base_id, :collection_id, :specific_name, :prix, :stock, :image, :availability, :description)";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':base_id' => $produit->base_id,
            ':collection_id' => $produit->collection_id,
            ':specific_name' => $produit->specific_name,
            ':prix' => $produit->prix,
            ':stock' => $produit->stock,
            ':image' => $produit->image,
            ':availability' => $produit->availability,
            ':description'=> $produit->description
        ]);

        $BD->deconnexion();
        return $result;
    }

    public function updateProduit($produit) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE produit_lp SET specific_name = :specific_name, prix = :prix, stock = :stock, image = :image, availability = :availability
                WHERE id = :produit_id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':specific_name' => $produit->specific_name,
            ':prix' => $produit->prix,
            ':stock' => $produit->stock,
            ':image' => $produit->image,
            ':availability' => $produit->availability,
            ':produit_id' => $produit->id,
            ':description'=> $produit->description
        ]);

        $BD->deconnexion();
        return $result;
    }


    public function deleteProduit($produit_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "DELETE FROM produit_lp WHERE id = :produit_id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([':produit_id' => $produit_id]);

        $BD->deconnexion();
        return $result;
    }

    public function listProduits() {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.specific_name, p.prix, p.stock, p.image, c.collection_name 
                FROM produit_lp p 
                LEFT JOIN collection_lp c ON p.collection_id = c.id";
        $stat = $BD->pdo->prepare($sql);
        $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\Produit_lp');
        $stat->execute();
        $produits = $stat->fetchAll();

        $BD->deconnexion();
        return $produits;
    }
    public function getProduitById($produit_id) {
    $BD = new GestionBD();
    $BD->connexion();

    $sql = "SELECT p.id, p.specific_name, p.prix, p.stock, p.image, c.collection_name, p.availability, p.description
            FROM produit_lp p 
            LEFT JOIN collection_lp c ON p.collection_id = c.id 
            WHERE p.id = :produit_id";
    $stat = $BD->pdo->prepare($sql);
    $stat->bindParam(':produit_id', $produit_id, PDO::PARAM_INT);
    $stat->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'classe\\Produit_lp');
    $stat->execute();
    $produit = $stat->fetch();  // Utilise fetch() au lieu de fetchAll(), car tu attends un seul produit
    $BD->deconnexion();

    return $produit; // Retourne un seul objet produit ou false s'il n'y en a pas
    }


    public function getImagesProduit($produit_id) {
    $BD = new GestionBD();
    $BD->connexion();

    $sql = "SELECT image_path FROM images_produit WHERE produit_id = :id";
    $stmt = $BD->pdo->prepare($sql);
    $stmt->execute([':id' => $produit_id]);
    $images = $stmt->fetchAll(PDO::FETCH_COLUMN);

    $BD->deconnexion();
    return $images;
}


}
