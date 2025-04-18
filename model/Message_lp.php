<?php 
namespace bd;
require_once("GestionBD.php");
require_once("../class/Message_lp.php");
use bd\GestionBD ;
class Message {
    public function ajouterMessage($id_client, $contenu) {
        $db= new GestionBD();
        $db->connexion();
        $sql = "INSERT INTO message (user_id, message ) VALUES (:id_client, :contenu)";
        $stmt = $db->pdo->prepare($sql);
        return $stmt->execute([
            ':id_client' => $id_client,
            ':contenu' => $contenu
        ]);
        $db->deconnexion();
    }
}