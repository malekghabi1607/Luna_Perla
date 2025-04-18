<?php
session_start();
$racine_path = '../../';
$racine_path1 = '../';

require_once($racine_path . 'utils/csrf.php');
$csrf_token = generate_csrf_token();

$titre = 'Ajouter un utilisateur';

require_once($racine_path . "model/User_lp.php");
require_once($racine_path . "model/Person_lp.php");
require_once($racine_path . "class/User_lp.php");

use classe\User_lp;
use bd\User_lp as UserModel;
use bd\Person_lp;

$base_url = "/~uapv2500231/Luna_Perla";


$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        die("❌ Erreur CSRF : formulaire invalide.");
    }
    
    $user = new User_lp(
        null,
        $_POST['username'],
        $_POST['mot_de_passe'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['adresse']
    );

    if ($_POST['mot_de_passe'] !== $_POST['confirm_password']) {
        $message = "❌ Les mots de passe ne correspondent pas.";
    } else {
        $personModel = new Person_lp();
        if ($personModel->usernameOrEmailExists($user->username, $user->email)) {
            $message = "❌ Ce nom d'utilisateur ou email est déjà utilisé.";
        } else {
            $role = "user";
            $id = $personModel->savePerson($user, $role);

            if (!$id) {
                $message = "❌ Une erreur s’est produite lors de l’ajout à la table person.";
            } else {
                $userModel = new UserModel();
                if ($userModel->saveUser($user, $id)) {
                    // ✅ Redirect if success
                    header("Location: $base_url/admin/dashboard");
                    exit;
                } else {
                    $message = "❌ Erreur lors de l'ajout dans user_lp.";
                }
            }
        }
    }
}

// Affichage
include($racine_path1 . "templates/back/header.php");
include($racine_path1 . "templates/back/ajout_user.php");
include($racine_path1 . "templates/back/footer.php");
?>
