<?php
$racine_path = '../../';
$racine_path1 = '../';

$titre = 'Inscription Administrateur';

include($racine_path1 . "templates/back/header.php");

require_once($racine_path . "class/Admin_lp.php"); // Classe admin
require_once($racine_path . "model/Admin_lp.php"); // Requêtes BDD admin
require_once($racine_path . "model/Person_lp.php");

use classe\Admin_lp as AdminData;
use bd\Admin_lp as AdminDB;
use bd\Person_lp as PersonDB;

$base_url = "/~uapv2500231/Luna_Perla";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_password = $_POST['confirm_password'];
    $permissions = trim($_POST['permissions']);
    $department = trim($_POST['department']);

    // ✅ Validation
    if (!$username || !$email || !$mot_de_passe || !$confirm_password || !$permissions || !$department) {
        $message = "❌ Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Format d'email invalide.";
    } elseif ($mot_de_passe !== $confirm_password) {
        $message = "❌ Les mots de passe ne correspondent pas.";
    } else {
        // ✅ Créer l'objet admin
        $admin = new AdminData(
            null,
            $username,
            $mot_de_passe,
            $email,
            $permissions,
            $department
        );

        $personModel = new PersonDB();

        // ✅ Vérifier si username ou email déjà utilisés
        if ($personModel->usernameOrEmailExists($admin->username, $admin->email)) {
            $message = "❌ Ce nom d'utilisateur ou email est déjà utilisé.";
        } else {
            $role = "admin";
            // ✅ Étape 1 : insertion dans person_lp
            $idPerson = $personModel->savePerson($admin, $role);

            if (!$idPerson) {
                $message = "❌ Une erreur est survenue dans la création de l'identité.";
            } else {
                // ✅ Étape 2 : insertion dans admin_lp
                $adminModel = new AdminDB();
                $success = $adminModel->saveAdmin($admin, $idPerson);

                if ($success) {
                    header("Location: $base_url/admin/index");
                    exit;
                } else {
                    $message = "❌ Une erreur est survenue lors de l'inscription administrateur.";
                }
            }
        }
    }
}

include($racine_path1 . "templates/back/register.php");
include($racine_path1 . "templates/back/footer.php");
?>