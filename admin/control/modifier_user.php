<?php
session_start();
$racine_path = '../../';
$racine_path1 = '../';
$titre = 'Modifier un utilisateur';

require_once($racine_path . "model/User_lp.php");
require_once($racine_path . "model/Person_lp.php");
require_once($racine_path . "class/User_lp.php");

// Protection CSRF
require_once($racine_path . "utils/csrf.php");
$csrf_token = generate_csrf_token();

use bd\User_lp as UserModel;
use bd\Person_lp;
use classe\User_lp;

$base_url = "/~uapv2500231/Luna_Perla";

// ✅ Vérifier la connexion admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: $base_url/admin/login");
    exit;
}

// ✅ Récupération ID utilisateur depuis URL
if (!isset($_GET['id'])) {
    header("Location: $base_url/admin/dashboard");
    exit;
}

$user_id = intval($_GET['id']);

$personModel = new Person_lp();
$user = new UserModel();

// ✅ Récupération des infos utilisateur
$userData = $user->getUserById($user_id);

if (!$userData) {
    echo "<p>Utilisateur introuvable</p>";
    exit;
}

// ✅ Mise à jour si POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 🔐 Vérification CSRF
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        die(" Erreur CSRF : formulaire invalide.");
    }
    
    $userData->username = $_POST['username'];
    $userData->email = $_POST['email'];
    $userData->phone = $_POST['phone'];
    $userData->shipping_address = $_POST['shipping_address'];

    $success = $user->updateUser($userData, $user_id);
    if ($success) {
        header("Location: $base_url/admin/dashboard");
        exit;
    } else {
        $message = "❌ Erreur lors de la mise à jour de l'utilisateur.";
    }
}

include($racine_path1 . "templates/back/header.php");
include($racine_path1 . "templates/back/modifier_user.php");
include($racine_path1 . "templates/back/footer.php");