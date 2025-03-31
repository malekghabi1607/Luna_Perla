<?php
namespace bd;

use \PDO;
require('../class/Person_lp.php');
require('GestionBD.php');

use bd\GestionBD;

class Person_lp {

    /**
     * Save a new person (Insert into `person_lp`)
     */
    public function savePerson($person) {
        $BD = new GestionBD();
        $BD->connexion();

        // Hash the password before storing it
        $hashedPassword = password_hash($person->password_hash, PASSWORD_BCRYPT);

        $sql = "INSERT INTO person_lp (username, password_hash, email) VALUES (:username, :password, :email)";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':username' => $person->username,
            ':password' => $hashedPassword,
            ':email' => $person->email
        ]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Update an existing person
     */
    public function updatePerson($person) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE person_lp SET username = :username, email = :email WHERE id = :id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':username' => $person->username,
            ':email' => $person->email,
            ':id' => $person->id
        ]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Delete a person by ID
     */
    public function deletePerson($person_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "DELETE FROM person_lp WHERE id = :person_id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([':person_id' => $person_id]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Get all persons
     */
    public function listPersons() {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT * FROM person_lp";
        $stat = $BD->pdo->prepare($sql);
        $stat->execute();
        $persons = $stat->fetchAll(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $persons;
    }

    /**
     * Get a single person by ID
     */
    public function getPersonById($person_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT * FROM person_lp WHERE id = :person_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':person_id', $person_id);
        $stat->execute();
        $person = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $person;
    }
}
?>