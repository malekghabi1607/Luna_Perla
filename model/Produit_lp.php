<?php
namespace bd;

use \PDO;

require_once(__DIR__ . '/../class/Produit_lp.php');
require_once(__DIR__ . '/../class/Produit_lp.php');

require_once('GestionBD.php');

use bd\GestionBD;


class Produit_lp {

    public function saveProduit($produit) {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "INSERT INTO produit_lp (base_id, specific_name, prix, stock, image, availability, description)
        VALUES (:base_id, :specific_name, :prix, :stock, :image, :availability, :description)";
$stmt = $BD->pdo->prepare($sql);
$result = $stmt->execute([
    ':base_id' => $produit->base_id,
    ':specific_name' => $produit->specific_name,
    ':prix' => $produit->prix,
    ':stock' => $produit->stock,
    ':image' => $produit->image,
    ':availability' => $produit->availability,
    ':description' => $produit->description
]);
    
        $BD->deconnexion();
        return $result;
    }

    public function getAllProduits() {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "SELECT * FROM produit_lp";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute();
    
        $produits = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produit = new \classe\Produit_lp();
            $produit->id = $row['id'];
            $produit->specific_name = $row['specific_name'];
            $produit->prix = $row['prix'];
            $produit->image = $row['image'];
            $produit->stock = $row['stock'];
            $produits[] = $produit;
        }
    
        $BD->deconnexion();
        return $produits;
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
    
        $stmt = $BD->pdo->prepare("DELETE FROM produit_lp WHERE id = :id");
        $stmt->execute([':id' => $produit_id]);
    
        $BD->deconnexion();
        return true;
    }

    public function listProduits() {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "SELECT p.id, p.specific_name, p.prix, p.stock, p.image, p.availability, p.description, 
                       p.collection_id, c.collection_name 
                FROM produit_lp p 
                LEFT JOIN collection_lp c ON p.collection_id = c.id";
    
        $stat = $BD->pdo->prepare($sql);
        $stat->execute();
    
        $produits = [];
    
        while ($row = $stat->fetch(PDO::FETCH_ASSOC)) {
            $produit = new \classe\Produit_lp();
            $produit->id = $row['id'];
            $produit->specific_name = $row['specific_name'];
            $produit->prix = $row['prix'];
            $produit->stock = $row['stock'];
            $produit->image = $row['image'];
            $produit->availability = $row['availability'] ?? null;
            $produit->description = $row['description'] ?? '';
            $produit->collection_id = $row['collection_id'] ?? null;
            $produit->collection_name = $row['collection_name'] ?? '';
    
            $produits[] = $produit;
        }
    
        $BD->deconnexion();
        return $produits; // Array of Produit_lp objects
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
        $stat->execute();
        $row = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();

        if ($row) {
            $produit = new \classe\Produit_lp();
            $produit->id = $row['id'];
            $produit->specific_name = $row['specific_name'];
            $produit->prix = $row['prix'];
            $produit->stock = $row['stock'];
            $produit->image = $row['image'];
            $produit->collection_name = $row['collection_name'] ?? null;
            $produit->availability = $row['availability'];
            $produit->description = $row['description'];
            return $produit;
        }

        return false;
    }

    public function modifierProduit($produit) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE produit_lp SET specific_name = :specific_name, prix = :prix, stock = :stock, image = :image, availability = :availability, description = :description WHERE id = :id";
        $stmt = $BD->pdo->prepare($sql);

        $success = $stmt->execute([
            ':specific_name' => $produit->specific_name,
            ':prix' => $produit->prix,
            ':stock' => $produit->stock,
            ':image' => $produit->image,
            ':availability' => $produit->availability,
            ':description' => $produit->description,
            ':id' => $produit->id
        ]);

        $BD->deconnexion();
        return $success;
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
