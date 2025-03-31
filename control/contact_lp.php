<?php
session_start();

$racine_path = '../';
$titre = 'Formulaire de contact'; // titre de la page
include($racine_path . "templates/front/header.php"); // header recuperer dans header.php
require_once 'class/Contact_lp.php';
require_once($racine_path . "model/GestionBD.php");
use bd\GestionBD;

$message = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // verification si la formulaire est bien ete envoyer
   
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL); // suprimer les espaces inutiles avec trim
    $contenu = trim($_POST['message']); //securiser l'email avec filter sanitize email

 
    if (empty($email) || empty($contenu)) { // verification s tout les champs sont bien remplis
        $message = "Erreur : Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Erreur : Email invalide.";
    } else {
  
        $client = new Client(); // creation d;n nouveau objet dans db
        $id_client = $client->getClientIdByEmail($email); // chercher l'id via la bd

        if (!$id_client) {
            $message = "Erreur : Client non trouvé."; // si perssone n'est trouver envoyer un message de client non trouve
        } else {
      
            $messageDB = new Message(); // si client existe on cree un objet messafe
            if ($messageDB->ajouterMessage($id_client, $contenu)) { // on appelle ajouter message pour inserer le message dans la bd 
                $cas = 'success'; // si il est bien envoyer
                $message = "Message envoyé avec succès !";
            } else {
                $cas= 'error';
                $message= "Erreur : Impossible d'envoyer le message.";
            }
        }
    }

   //Tu affiches une boîte contenant le message et Tu arrêtes le script avec die()
    die("<div class='message-box $cas'><p>$message</p><a href='../index.php' class='btn'>Retour</a></div>");
}


$action = $racine_path . "control/confirmation.php";
$method = "POST";

include($racine_path . "templates/front/contact.php");

include($racine_path . "templates/front/footer.php"); ?>