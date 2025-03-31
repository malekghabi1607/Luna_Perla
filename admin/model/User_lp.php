<?php
namespace bd;

use \PDO;
require('../class/User_lp.php');
require_once(__DIR__ . '/../../model/GestionBD.php');

use bd\GestionBD;

class User_lp {
    private $pdo;

    public function saveUser($user) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "INSERT INTO person_lp (username, password_hash, email) VALUES (:username, :password, :email)";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $user->username,
            ':password' => $user->password_hash,
            ':email' => $user->email
        ]);
        $userId = $BD->pdo->lastInsertId();

        $sqlUser = "INSERT INTO user_lp (user_id, phone, shipping_address) VALUES (:user_id, :phone, :shipping_address)";
        $stmtUser = $BD->pdo->prepare($sqlUser);
        $result = $stmtUser->execute([
            ':user_id' => $userId,
            ':phone' => $user->phone,
            ':shipping_address' => $user->shipping_address
        ]);

        $BD->deconnexion();
        return $result;
    }




    public function getClientIdByEmail(string $email): ?int//méthode prend en paramètre un email chaine de caractere
    //Elle retourne un entier int s’il existe, ou null si aucun client trouvé
    {
        $db = new GestionDB(); // creation d'un nouveau objet 
        $db->connexion(); // ouvre la connexion a la base de donnees 
        // la requete qui qui cherche lutilisateur avec son id email  et le role egale l'utilisateur 
        $stmt = $db->pdo->prepare("SELECT id_utilisateur FROM utilisateur_mabib WHERE email = :email AND role = 'utilisateur'");
        $stmt->execute(['email' => $email]);

        $result = $stmt->fetch(); // recuperer le premier resultat 

        $db->deconnexion(); // deconnexion de la base 

        return $result ? (int) $result['id_utilisateur'] : null; // si le resultat trouver on returne result comme int  sinon nul 
    }

    
    public function deleteUser($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        // Delete from user_lp
        $sql = "DELETE FROM user_lp WHERE user_id = :user_id";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id]);

        // Delete from person_lp
        $sqlPerson = "DELETE FROM person_lp WHERE id = :user_id";
        $stmtPerson = $BD->pdo->prepare($sqlPerson);
        $result = $stmtPerson->execute([':user_id' => $user_id]);

        $BD->deconnexion();
        return $result;
    }

    public function listUsers() {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.username, p.email, u.phone, u.shipping_address 
                FROM person_lp p 
                JOIN user_lp u ON p.id = u.user_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->execute();
        $users = $stat->fetchAll(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $users;
    }

    public function getUserById($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.username, p.email, u.phone, u.shipping_address 
                FROM person_lp p 
                JOIN user_lp u ON p.id = u.user_id 
                WHERE u.user_id = :user_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':user_id', $user_id);
        $stat->execute();
        $user = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $user;
    }

    public function updateUser($user) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE person_lp SET username = :username, email = :email WHERE id = :user_id";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $user->username,
            ':email' => $user->email,
            ':user_id' => $user->id
        ]);

        $sqlUser = "UPDATE user_lp SET phone = :phone, shipping_address = :shipping_address WHERE user_id = :user_id";
        $stmtUser = $BD->pdo->prepare($sqlUser);
        $result = $stmtUser->execute([
            ':phone' => $user->phone,
            ':shipping_address' => $user->shipping_address,
            ':user_id' => $user->id
        ]);

        $BD->deconnexion();
        return $result;
    }



}
?>