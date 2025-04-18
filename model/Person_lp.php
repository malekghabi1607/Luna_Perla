<?php
namespace bd;

use \PDO;

require_once('GestionBD.php');

use bd\GestionBD;

class Person_lp {

    /**
     * Save a new person (Insert into `person_lp`)
     */
    public function savePerson($person, $role) {
        $BD = new GestionBD();
        $BD->connexion();
    
        // Vérifier si email ou username déjà utilisé
        $stmt = $BD->pdo->prepare("SELECT COUNT(*) FROM person_lp WHERE email = :email OR username = :username");
        $stmt->execute([':email' => $person->email, ':username' => $person->username]);
    
        if ($stmt->fetchColumn() > 0) {
            $BD->deconnexion();
            return false;
        }
    
        // Insérer la personne
        $stmt = $BD->pdo->prepare("INSERT INTO person_lp (username, password_hash, email, role) VALUES (:username, :password, :email, :role)");
        $stmt->execute([
            ':username' => $person->username,
            ':password' => password_hash($person->password_hash, PASSWORD_BCRYPT),
            ':email' => $person->email,
            ':role' => $role
        ]);
    
        $id = $BD->pdo->lastInsertId();
        $BD->deconnexion();
        return $id;
    }

    public function checkLoginUser($email, $password) {
        $BD = new GestionBD();
        $BD->connexion();
    
        // ✅ Correction ici (plus de quotes autour de :email)
        $sql = "SELECT * FROM person_lp WHERE email = :email AND role = 'user'";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $BD->deconnexion();
    
        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;
        }
    
        return false;
    }

    public function checkLoginAdmin($email, $password) {
        $BD = new GestionBD();
        $BD->connexion();
    
        // Debug 1️⃣ : Email reçu
        echo "<script>alert('DEBUG: Email reçu: " . addslashes($email) . "');</script>";
    
        $sql = "SELECT * FROM person_lp WHERE email = :email";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
    
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Debug 2️⃣ : Est-ce qu'on a récupéré un résultat ?
        if ($admin) {
            echo "<script>alert('DEBUG: Utilisateur trouvé: " . addslashes($admin['username']) . "');</script>";
            echo "<script>alert('DEBUG: Password hash: " . addslashes($admin['password_hash']) . "');</script>";
        } else {
            echo "<script>alert('DEBUG: Aucun utilisateur trouvé pour cet email');</script>";
            $BD->deconnexion();
            return false;
        }
    
        $BD->deconnexion();
    
        // Debug 3️⃣ : Vérification mot de passe
        if (password_verify($password, $admin['password_hash'])) {
            echo "<script>alert('DEBUG: Mot de passe valide ✅');</script>";
            return $admin;
        } else {
            echo "<script>alert('DEBUG: Mot de passe incorrect ❌');</script>";
        }
    
        return false;
    }

    public function usernameOrEmailExists($username, $email) {
        $BD = new GestionBD();
        $BD->connexion();
    
        // Clean and normalize
        $username = strtolower(trim($username));
        $email = strtolower(trim($email));
    
        $stmt = $BD->pdo->prepare("
            SELECT COUNT(*) FROM person_lp 
            WHERE LOWER(TRIM(username)) = :username OR LOWER(TRIM(email)) = :email
        ");
        $stmt->execute([
            ':username' => $username,
            ':email' => $email
        ]);
    
        $count = $stmt->fetchColumn();
        $BD->deconnexion();
    
        return $count > 0;
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
    
        $stmt = $BD->pdo->prepare("DELETE FROM person_lp WHERE id = :id");
        $stmt->execute([':id' => $person_id]);
    
        $BD->deconnexion();
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