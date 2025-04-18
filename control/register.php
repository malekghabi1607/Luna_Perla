<?php
/**
 * @file register.php
 * @version 1.0
 * @date 2025-04-07
 * @description 
 * Ce fichier affiche le formulaire d'inscription d'un nouvel utilisateur.
 * Il inclut une protection CSRF pour sécuriser les données envoyées.
 * 
 * Fonctionnalités :
 * - Affiche un formulaire d'inscription
 * - Génère un token CSRF
 * - Enregistre l'utilisateur dans la base de données après validation
 */

 session_start();

require_once('../utils/csrf.php');
$csrf_token = generate_csrf_token();

$racine_path = '../';
$titre = 'Inscription';

include($racine_path . "templates/front/header.php");

require_once($racine_path . "class/User_lp.php"); // Données utilisateur
require_once($racine_path . "model/User_lp.php"); // Opérations DB pour user
require_once($racine_path . "model/Person_lp.php"); // Opérations DB pour person

use classe\User_lp as UserData;
use bd\User_lp as UserDB;
use bd\Person_lp as PersonDB;

$base_url = "/~uapv2500231/Luna_Perla";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        die("❌ Erreur CSRF : formulaire invalide.");
    }

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirm_password = $_POST['confirm_password'];
    $telephone = trim($_POST['telephone']);
    $adresse = trim($_POST['adresse']);

    // ✅ Validation
    if (!$username || !$email || !$mot_de_passe || !$confirm_password || !$telephone || !$adresse) {
        $message = "❌ Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "❌ Format d'email invalide.";
    } elseif ($mot_de_passe !== $confirm_password) {
        $message = "❌ Les mots de passe ne correspondent pas.";
    } elseif (!preg_match('/^\d{10}$/', $telephone)) {
        $message = "❌ Numéro de téléphone invalide.";
    } else {
        // ➤ Créer l'utilisateur
        $user = new UserData(null, $username, $mot_de_passe, $email, $telephone, $adresse);

        // ➤ Sauvegarder dans `person_lp`
        $personModel = new PersonDB();
        $role = 'user';
        $idPerson = $personModel->savePerson($user, $role);

        if (!$idPerson) {
            $message = "❌ Ce nom d'utilisateur ou email est déjà utilisé.";
        } else {
            // ➤ Sauvegarder dans `user_lp`
            $userModel = new UserDB();
            $success = $userModel->saveUser($user, $idPerson);

            if ($success) {
                // ✅ Stocker succès temporairement (cookie ou session flash)
                setcookie('register_success', '1', time() + 5, '/');
                header("Location: $base_url/login");
                exit;
            } else {
                $message = "❌ Une erreur est survenue lors de l'inscription utilisateur.";
            }
        }
    }
}

include($racine_path . "templates/front/register.php");
include($racine_path . "templates/front/footer.php");
