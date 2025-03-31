<?php
$racine_path = '../';
$titre = 'Inscription';

include($racine_path . "templates/front/header.php");

require_once($racine_path . "model/GestionBD.php");
use bd\GestionBD;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $adresse = $_POST['adresse'] ?? '';

    if ($username && $email && $mot_de_passe) {
        $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $DB = new GestionBD();
        $DB->connexion();

        try {
            // Insertion dans person_lp
            $stmt1 = $DB->pdo->prepare("INSERT INTO person_lp (username, password_hash, email, role) VALUES (:username, :password_hash, :email, 'user')");
            $stmt1->execute([
                ':username' => $username,
                ':password_hash' => $hash,
                ':email' => $email
            ]);

            $user_id = $DB->pdo->lastInsertId();

            // Insertion dans user_lp
            $stmt2 = $DB->pdo->prepare("INSERT INTO user_lp (user_id, phone, shipping_address) VALUES (:user_id, :phone, :adresse)");
            $stmt2->execute([
                ':user_id' => $user_id,
                ':phone' => $telephone,
                ':adresse' => $adresse
            ]);

            $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        } catch (PDOException $e) {
            $message = "Erreur lors de l'inscription : " . $e->getMessage();
        }

        $DB->deconnexion();
    } else {
        $message = "Merci de remplir tous les champs.";
    }
}

// Formulaire d'inscription
include($racine_path . "templates/front/register.php");
include($racine_path . "templates/front/footer.php");
?>