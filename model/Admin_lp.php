<?php
namespace bd;

use \PDO;
require_once('../../class/Admin_lp.php');
require_once('../../class/Person_lp.php');
require_once('GestionBD.php');

use classe\Admin_lp as AdminClass; // Alias for clarity

use bd\GestionBD;

class Admin_lp {

    /**
     * Add a new admin.
     */
    public function saveAdmin($admin, $adminId) {
        $BD = new GestionBD();
        $BD->connexion();
    
        // ✅ Insère uniquement dans admin_lp
        $stmt = $BD->pdo->prepare("
            INSERT INTO admin_lp (admin_id, permissions, department)
            VALUES (:admin_id, :permissions, :department)
        ");
        $success = $stmt->execute([
            ':admin_id' => $adminId,
            ':permissions' => $admin->permissions,
            ':department' => $admin->department
        ]);
    
        $BD->deconnexion();
        return $success;
    }

    public function getAdminByEmail($email) {
        $db = new GestionBD();
        $db->connexion();
    
        $stmt = $db->pdo->prepare("SELECT 
                                    p.id,
                                    p.username,
                                    p.email,
                                    p.role,
                                    a.permissions,
                                    a.department
                                FROM 
                                    person_lp p
                                INNER JOIN 
                                    admin_lp a ON p.id = a.admin_id
                                WHERE 
                                    p.email = :email AND p.role = 'admin'");
        
        $stmt->execute([':email' => $email]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $db->deconnexion();
    
        if ($admin) {
            return new AdminClass(
                $admin['id'],              // $id
                $admin['username'],        // $username
                '',                        // $password_hash (optional)
                $admin['email'],           // $email
                $admin['permissions'],     // $permissions
                $admin['department']       // $department
            );
        }
    
        return null;
    }

    public function updateAdmin($admin) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE person_lp SET username = :username, email = :email WHERE id = :admin_id";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $admin->username,
            ':email' => $admin->email,
            ':admin_id' => $admin->id
        ]);

        $sqlAdmin = "UPDATE admin_lp SET permissions = :permissions, department = :department WHERE admin_id = :admin_id";
        $stmtAdmin = $BD->pdo->prepare($sqlAdmin);
        $result = $stmtAdmin->execute([
            ':permissions' => $admin->permissions,
            ':department' => $admin->department,
            ':admin_id' => $admin->id
        ]);

        $BD->deconnexion();
        return $result;
    }
    
    /**
     * Delete an admin by ID.
     */
    public function deleteAdmin($admin_id) {
        $BD = new GestionBD();
        $BD->connexion();

        // Delete from admin_lp
        $sql = "DELETE FROM admin_lp WHERE admin_id = :admin_id";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([':admin_id' => $admin_id]);

        // Delete from person_lp
        $sqlPerson = "DELETE FROM person_lp WHERE id = :admin_id";
        $stmtPerson = $BD->pdo->prepare($sqlPerson);
        $result = $stmtPerson->execute([':admin_id' => $admin_id]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Get all admins.
     */
    public function listAdmins() {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.username, p.email, a.permissions, a.department 
                FROM person_lp p 
                JOIN admin_lp a ON p.id = a.admin_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->execute();
        $admins = $stat->fetchAll(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $admins;
    }

    /**
     * Get a single admin by ID.
     */
    public function getAdminById($admin_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT p.id, p.username, p.email, a.permissions, a.department 
                FROM person_lp p 
                JOIN admin_lp a ON p.id = a.admin_id
                WHERE a.admin_id = :admin_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':admin_id', $admin_id);
        $stat->execute();
        $admin = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $admin;
    }


}
?>