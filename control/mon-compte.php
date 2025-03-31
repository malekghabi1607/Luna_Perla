<?php
$titre = 'Mon compte';
require_once("../model/User_lp.php");
use bd\User_lp;

$racine_path = "../";
//include($racine_path . "templates/front/header.php");

$userModel = new User_lp();

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $infos = $userModel->getUserByEmail($email);

    if ($infos) {
        include($racine_path . "templates/front/compte.php");
    } else {
        echo "<p>Utilisateur non trouvé.</p>";
    }
} else {
    echo "<p>Accès refusé. Paramètre manquant.</p>";
}

include($racine_path . "templates/front/footer.php");
?>
