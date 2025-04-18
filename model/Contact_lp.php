<?php
namespace bd;

use \PDO;
require_once('GestionBD.php'); // ✅ toujours utiliser require_once
if (file_exists(__DIR__ . '/../class/Contact_lp.php')) {
    require_once(__DIR__ . '/../class/Contact_lp.php');
} elseif (file_exists(__DIR__ . '/../../class/Contact_lp.php')) {
    require_once(__DIR__ . '/../../class/Contact_lp.php');
} else {
    die("❌ Fichier Contact_lp.php introuvable.");
}

use classe\Contact_lp as Contact;

class Contact_lp {

    public function getAllContacts() {
        $BD = new GestionBD();
        $BD->connexion();
    
        $sql = "SELECT id, nom, email, objet, message, date_envoi FROM contact_lp ORDER BY date_envoi DESC";
        $stmt = $BD->pdo->prepare($sql);
        $stmt->execute();
    
        $contacts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contact = new \classe\Contact_lp(
                $row['id'],
                $row['nom'],
                $row['email'],
                $row['objet'],
                $row['message'],
                $row['date_envoi']
            );
            $contacts[] = $contact;
        }
    
        $BD->deconnexion();
        return $contacts;
    }

    /**
     * Save a new contact message (Insert into `contact_lp`)
     */
    public function ajouterMessage(Contact $contact): bool {
        $db = new GestionBD();
        $db->connexion();
    
        $sql = "INSERT INTO contact_lp (nom, email, objet, message)
                VALUES (:nom, :email, :objet, :message)";
        $stmt = $db->pdo->prepare($sql);
    
        $result = $stmt->execute([
            ':nom'     => $contact->nom,
            ':email'   => $contact->email,
            ':objet'   => $contact->objet,
            ':message' => $contact->message
        ]);
    
        $db->deconnexion();
        return $result;
    }

    /**
     * Update an existing contact message
     */
    public function updateContact($contact) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "UPDATE contact_lp SET sujet = :sujet, message = :message WHERE id = :id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([
            ':sujet' => $contact->sujet,
            ':message' => $contact->message,
            ':id' => $contact->id
        ]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Delete a contact message by ID
     */
    public function deleteContact($contact_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "DELETE FROM contact_lp WHERE id = :contact_id";
        $stmt = $BD->pdo->prepare($sql);
        $result = $stmt->execute([':contact_id' => $contact_id]);

        $BD->deconnexion();
        return $result;
    }

    /**
     * Get all contact messages
     */
    public function listContacts() {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT c.id, c.sujet, c.message, c.date_envoi, u.username, u.email 
                FROM contact_lp c
                JOIN user_lp u ON c.user_id = u.user_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->execute();
        $contacts = $stat->fetchAll(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $contacts;
    }

    /**
     * Get a single contact message by ID
     */
    public function getContactById($contact_id) {
        $BD = new GestionBD();
        $BD->connexion();

        $sql = "SELECT c.id, c.sujet, c.message, c.date_envoi, u.username, u.email 
                FROM contact_lp c
                JOIN user_lp u ON c.user_id = u.user_id
                WHERE c.id = :contact_id";
        $stat = $BD->pdo->prepare($sql);
        $stat->bindParam(':contact_id', $contact_id);
        $stat->execute();
        $contact = $stat->fetch(PDO::FETCH_ASSOC);

        $BD->deconnexion();
        return $contact;
    }
}
?>