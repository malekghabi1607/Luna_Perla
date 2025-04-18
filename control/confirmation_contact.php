<?php
/**
 * @file confirmation_contact.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Page de remerciement après envoi du formulaire de contact.
 * Elle affiche un message personnalisé à l’utilisateur.
 */

 session_start();

$racine_path = '../';
$base_url = "/~uapv2500231/Luna_Perla";
$titre = "Merci d'avoir pris contact avec nous";

include($racine_path . "templates/front/header.php");

if (isset($_SESSION['contact_data'])) {
    $name = htmlspecialchars($_SESSION['contact_data']['nom']);
    $email = htmlspecialchars($_SESSION['contact_data']['email']);
    $subject = htmlspecialchars($_SESSION['contact_data']['objet']);
    $message = nl2br(htmlspecialchars($_SESSION['contact_data']['message']));

    unset($_SESSION['contact_data']);

    include($racine_path . "templates/front/confirmation_contact.php");
    include($racine_path . "templates/front/footer.php");
    exit; // ✅ Prevent going further
} else {
    // ❌ Reached only if no session data
    echo "<p style='color:red; text-align:center; font-size:18px;'>❌ Erreur : aucune donnée reçue.</p>";
}

include($racine_path . "templates/front/footer.php");
?>