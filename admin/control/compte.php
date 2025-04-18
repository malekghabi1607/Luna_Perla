<?php
/**
 * @file compte.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Permet d'afficher les informations personnelles de l'utilisateur.
 * Accessible uniquement après authentification.
 */

 $racine_path = '../';
$titre = 'Mon compte Admin';

session_start(); 

$base_url = "/~uapv2500231/Luna_Perla";


// ✅ Si l'admin n'est pas connecté, alerte + redirection
if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('❌ Vous devez être connecté pour accéder à cette page.'); window.location.href = 'login.php';</script>";
    exit();
}

// ✅ Charger les modèles et les classes nécessaires
require_once($racine_path . "../model/Admin_lp.php");  // ✔️ vérifie bien le chemin
require_once($racine_path . "../class/Admin_lp.php");

use bd\Admin_lp;

// ✅ Récupérer l'admin via son email
$email = $_SESSION['admin_email'];
$AdminModel = new Admin_lp();
$infos = $AdminModel->getAdminByEmail($email);

// ✅ Affichage
include($racine_path . 'templates/back/header.php');

if ($infos) {
    include($racine_path . "templates/back/compte.php");
} else {
    echo "<p style='color:red;'>❌ Utilisateur non trouvé.</p>";
}

include($racine_path . 'templates/back/footer.php');
?>