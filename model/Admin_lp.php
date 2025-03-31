<?php
namespace bd;

use \PDO;
require('../class/Admin_lp.php');
require('GestionBD.php');

use bd\GestionBD;

class Admin_lp {

    /**
     * Add a new admin.
     */
    public function saveAdmin($admin) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "INSERT INTO person_lp (username, password_hash, email) VALUES (:username, :password, :email)";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute([
            ':username' => $admin->username,
            ':password' => $admin->password_hash,
            ':email' => $admin->email
        ]);
        $adminId = $BD->pdo->lastInsertId();

        $sqlAdmin = "INSERT INTO admin_lp (admin_id, permissions, department) VALUES (:admin_id, :permissions, :department)";
        $stmtAdmin = $BD->pdo->prepare($sqlAdmin);
        $result = $stmtAdmin->execute([
            ':admin_id' => $adminId,
            ':permissions' => $admin->permissions,
            ':department' => $admin->department
        ]);

        $BD->deconnexion();
        return $result;
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