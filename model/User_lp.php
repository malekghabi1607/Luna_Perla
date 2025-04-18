<?php
namespace bd;

use \PDO;
#require_once('../class/User_lp.php');
if (file_exists(__DIR__ . '/../../class/User_lp.php')) {
    require_once(__DIR__ . '/../../class/User_lp.php');
} elseif (file_exists(__DIR__ . '/../class/User_lp.php')) {
    require_once(__DIR__ . '/../class/User_lp.php');
} else {
    die("❌ Erreur : Le fichier User_lp.php est introuvable.");
}

if (file_exists(__DIR__ . '/../../class/Person_lp.php')) {
    require_once(__DIR__ . '/../../class/Person_lp.php');
} elseif (file_exists(__DIR__ . '/../class/Person_lp.php')) {
    require_once(__DIR__ . '/../class/Person_lp.php');
} else {
    die("❌ Erreur : Le fichier Person_lp.php est introuvable.");
}

require_once('GestionBD.php');

use classe\User_lp as UserClass; // Alias for clarity

use bd\GestionBD;

class User_lp {
    private $pdo;

    public function saveUser($user, $idPerson) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "INSERT INTO user_lp (user_id, phone, shipping_address) VALUES (:user_id, :phone, :shipping_address)";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':user_id' => $idPerson,
            ':phone' => $user->phone,
            ':shipping_address' => $user->shipping_address
        ]);

        $BD->deconnexion();
        return $result;
    }

    public function getUserByEmail($email) {
        $db = new GestionBD();
        $db->connexion();
        
        $stmt = $db->pdo->prepare("SELECT 
                                        p.id,
                                        p.username,
                                        p.email,
                                        p.role,
                                        u.phone,
                                        u.shipping_address
                                    FROM 
                                        person_lp p
                                    INNER JOIN 
                                        user_lp u ON p.id = u.user_id
                                    WHERE 
                                        p.email = :email AND p.role = 'user'");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $db->deconnexion();

        
        if ($user) {
            return new UserClass(
                $user['id'],
                $user['username'],
                '', // password_hash not needed here
                $user['email'],
                $user['phone'],
                $user['shipping_address']
            );
        }
    
        return null;    
    }

    public function deleteUser($user_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $stmt = $BD->pdo->prepare("DELETE FROM user_lp WHERE user_id = :id");
        $stmt->execute([':id' => $user_id]);

        $BD->deconnexion();
    }

    public function getAllUsers() {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "SELECT 
                    p.id,
                    p.username,
                    p.email,
                    p.role,
                    u.phone,
                    u.shipping_address
                FROM person_lp p
                INNER JOIN user_lp u ON p.id = u.user_id";
    
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute();
    
        $users = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new \classe\User_lp();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->email = $row['email'];
            $user->role = $row['role'];
            $user->phone = $row['phone'];
            $user->shipping_address = $row['shipping_address'];
    
            $users[] = $user;
        }
    
        $BD->deconnexion();
        return $users;
    }

    public function getUserById($id) {
        $BD = new GestionBD();
        $BD->connexion();
    
        $stmt = $BD->pdo->prepare("SELECT u.phone, u.shipping_address, p.id, p.username, p.email 
                                    FROM user_lp u 
                                    JOIN person_lp p ON u.user_id = p.id 
                                    WHERE u.user_id = :id");
    
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $BD->deconnexion();
    
        if ($row) {
            $user = new \classe\User_lp();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->email = $row['email'];
            $user->phone = $row['phone'];
            $user->shipping_address = $row['shipping_address'];
            return $user;
        }
        return null;
    }
    
    public function updateUser($user, $id) {
        $BD = new GestionBD();
        $BD->connexion();
    
        $stmt1 = $BD->pdo->prepare("UPDATE person_lp SET username = :username, email = :email WHERE id = :id");
        $stmt2 = $BD->pdo->prepare("UPDATE user_lp SET phone = :phone, shipping_address = :shipping_address WHERE user_id = :id");
    
        $result1 = $stmt1->execute([
            ':username' => $user->username,
            ':email' => $user->email,
            ':id' => $id
        ]);
    
        $result2 = $stmt2->execute([
            ':phone' => $user->phone,
            ':shipping_address' => $user->shipping_address,
            ':id' => $id
        ]);
    
        $BD->deconnexion();
        return $result1 && $result2;
    }
}
?>