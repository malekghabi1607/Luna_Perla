<?php
$racine_path = '../';
$titre = 'Connexion';

require_once($racine_path . "model/GestionBD.php");
use bd\GestionBD;

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $DB = new GestionBD();
    $DB->connexion();

    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];

    $stmt = $DB->pdo->prepare("SELECT * FROM person_lp WHERE email = :email AND role = 'user'");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($mot_de_passe, $user['password_hash'])) {
        header("Location: collection.php");
        exit;
    } else {
        $message = "Identifiants incorrects !";
    }

    $DB->deconnexion();
}

// Inclusion de l'en-tête du front-office
include($racine_path . "templates/front/header.php");

echo '<main class="padding_login">';

include($racine_path . "templates/front/login.php");

echo '</main>';

include($racine_path . "templates/front/footer.php");
?>