<?php
namespace bd;

use \PDO;
require('../class/Contact_lp.php');
require('GestionBD.php');

use bd\GestionBD;

class Contact_lp {

    /**
     * Save a new contact message (Insert into `contact_lp`)
     */
    public function ajouterMessage(int $id_client, string $contenu): bool // methode recoit l'id de client 
    // returner true si le message est bien inserer dans la base de donnees 
    {
        $db = new GestionDB(); // ouvre une connexion a la abse de donnees 
        $db->connexion();
            // preparation de la requete avec le contenu taper par l'utilisateur 
        $stmt = $db->pdo->prepare(" 
            INSERT INTO message_contact (id_client, contenu)
            VALUES (:id_client, :contenu)
        ");

        $result = $stmt->execute([ // execution de la requete 
            'id_client' => $id_client,
            'contenu' => $contenu
        ]);

        $db->deconnexion(); // deconnexion de la base de donnees 

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