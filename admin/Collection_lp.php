<?php
namespace bd;

use \PDO;
require('../class/Collection_lp.php');
require('GestionBD.php');

use bd\GestionBD;

class Collection_lp {

    /**
     * Save a new collection (Insert into `collection_lp`)
     */
    public function saveCollection($collection) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "INSERT INTO collection_lp (collection_name, description) VALUES (:collection_name, :description)";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':collection_name' => $collection->collection_name,
            ':description' => $collection->description
        ]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Update an existing collection
     */
    public function updateCollection($collection) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE collection_lp SET collection_name = :collection_name, description = :description WHERE id = :id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':collection_name' => $collection->collection_name,
            ':description' => $collection->description,
            ':id' => $collection->id
        ]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Delete a collection by ID
     */
    public function deleteCollection($collection_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "DELETE FROM collection_lp WHERE id = :collection_id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([':collection_id' => $collection_id]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Get all collections
     */
    public function listCollections() {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT * FROM collection_lp";
        $stat = $BD->pdo->prepare($sql);
        $stat->execute();
        $collections = $stat->fetchAll(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $collections;
    }

    /**
     * Get a single collection by ID
     */
    public function getCollectionById($collection_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT * FROM collection_lp WHERE id = :collection_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':collection_id', $collection_id);
        $stat->execute();
        $collection = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $collection;
    }
}
?>