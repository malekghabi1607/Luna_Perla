<?php
/**
 * @file compte.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Permet d'afficher les informations personnelles de l'utilisateur.
 * Accessible uniquement après authentification.
 */

 session_start();

$racine_path = "../";
$titre = 'Mon compte';

require_once($racine_path . "model/User_lp.php");
use bd\User_lp;

$base_url = "/~uapv2500231/Luna_Perla";

// ✅ Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('❌ Vous devez être connecté pour accéder à votre compte.');</script>";
    header("Location: $base_url/login"); // URL Rewriting utilisée ici
    exit();
}

// ✅ Récupérer les informations de l'utilisateur
$email = $_SESSION['user_email'];
$userModel = new User_lp();
$infos = $userModel->getUserByEmail($email);

// ✅ Affichage du layout
include($racine_path . 'templates/front/header.php');

if ($infos) {
    include($racine_path . 'templates/front/compte.php');
} else {
    echo "<main><p style='color:red;text-align:center;'>❌ Utilisateur non trouvé.</p></main>";
}

include($racine_path . 'templates/front/footer.php');
?>