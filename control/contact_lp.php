<?php
/**
 * @file contact_lp.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Formulaire de contact principal du site.
 * Envoie les données vers la base et déclenche une confirmation.
 */

 // contact_lp.php
session_start();

$racine_path = '../';
$titre = 'Formulaire de contact';
$base_url = "/~uapv2401806/Luna_Perla";


require_once($racine_path . 'utils/csrf.php');
$csrf_token = generate_csrf_token();

require_once $racine_path . "model/Contact_lp.php";
require_once $racine_path . "class/Contact_lp.php";

use bd\Contact_lp as ContactDB;
use classe\Contact_lp;

$message = "";
$cas = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom     = trim($_POST['nom']);
    $email   = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $objet   = trim($_POST['objet']);
    $contenu = trim($_POST['message']);

    // ✅ Validation
    if (!$nom || !$email || !$objet || !$contenu) {
        $cas = 'error';
        $message = "❌ Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $cas = 'error';
        $message = "❌ Adresse e-mail invalide.";
    } else {
        $contact = new Contact_lp(null, $nom, $email, $objet, $contenu);

        $model = new ContactDB();
        if ($model->ajouterMessage($contact)) {
             // Envoi d'une alerte par mail
            $to = "malek.ghabi@alumni.univ-avignon.fr"; // remplace par ta vraie adresse
            $subject = "📨 Nouveau message de contact sur Luna Perla";
            $body = "Vous avez reçu un nouveau message depuis le site Luna Perla.\n\n";
            $body .= "Nom : $nom\n";
            $body .= "Email : $email\n";
            $body .= "Objet : $objet\n";
            $body .= "Message :\n$contenu\n";

            $headers = "From: no-reply@lunaperla.com";

            mail($to, $subject, $body, $headers);

            $cas = 'success';
            $message = "✅ Votre message a été envoyé avec succès.";
        } else {
            $cas = 'error';
            $message = "❌ Erreur lors de l'envoi du message.";
        }
    }

    // Affichage simple
    die("<div class='message-box $cas'><p>$message</p><a href='" . $base_url . "/' class='btn'>Retour</a></div>");}

include($racine_path . 'templates/front/header.php');
include($racine_path . 'templates/front/contact.php');
include($racine_path . 'templates/front/footer.php');?>