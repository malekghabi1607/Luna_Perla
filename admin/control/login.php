<?php
/**
 * @file login.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Formulaire de connexion utilisateur.
 * Vérifie les identifiants et ouvre une session sécurisée.
 */

 session_start();

$racine_path = '../';
$racine_path1 = '../../';
$racine_path2 = '../';

require_once($racine_path1 . "utils/csrf.php");
$csrf_token = generate_csrf_token();

$titre = 'Connexion_Admin';
$base_url = "/~uapv2500231/Luna_Perla";

// 🔁 Charger la classe depuis le bon chemin
$path = file_exists($racine_path . 'model/Person_lp.php') 
    ? $racine_path . 'model/Person_lp.php' 
    : $racine_path1 . 'model/Person_lp.php';

require_once($path);
use bd\Person_lp;

$message = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        die("❌ Erreur CSRF : token invalide.");
    }

    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['password'];

    $personModel = new Person_lp();
    $admin = $personModel->checkLoginAdmin($email, $mot_de_passe);

    if ($admin) {
        $_SESSION['admin_email'] = $email;
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['username'];

        // Redirection propre
        header("Location: $base_url/admin/dashboard");
        exit;
    } else {
        $message = "❌ Identifiants incorrects.";
    }
}

// ⬇️ INCLUSIONS TEMPLATES
include($racine_path2 . "templates/back/header.php");
echo '<main class="padding_login">';

include($racine_path2 . "templates/back/login.php");
echo '</main>';
include($racine_path2 . "templates/back/footer.php");
?>

