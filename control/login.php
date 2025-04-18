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

require_once('../utils/csrf.php');
$csrf_token = generate_csrf_token();

$racine_path = '../';
$titre = 'Connexion';
$base_url = "/~uapv2500231/Luna_Perla";

require_once($racine_path . "model/Person_lp.php");
require_once($racine_path . "model/ProduitUserPanier_lp.php");

use bd\Person_lp;
use bd\ProduitUserPanier_lp;

$message = "";

// 🔒 Traitement du formulaire de connexion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 🔐 Vérification du token CSRF
    if (!verify_csrf_token($_POST['csrf_token'] ?? '')) {
        die("❌ Erreur CSRF : formulaire invalide.");
    }
    
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];

    $personModel = new Person_lp();
    $user = $personModel->checkLoginUser($email, $mot_de_passe);

    if ($user) {
        $_SESSION['user_email'] = $email;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['username'];

        // 💼 Migrer les produits du cookie vers la base de données
        if (isset($_COOKIE['panier'])) {
            $panierCookie = json_decode($_COOKIE['panier'], true);
            $model = new ProduitUserPanier_lp();
            $user_id = $_SESSION['user_id'];

            foreach ($panierCookie as $item) {
                $produit_id = $item['produit_id'] ?? null;
                $quantite = $item['quantite'] ?? 1;
                $couleur = $item['couleur'] ?? 'Gold';

                if ($produit_id) {
                    $model->ajouterProduitAuPanier($user_id, $produit_id, $quantite, $couleur);
                }
            }

            setcookie('panier', '', time() - 3600, '/');
        }

        header("Location: $base_url/");
        exit;
    } else {
        $message = "❌ Identifiants incorrects !";
    }
}

include($racine_path . "templates/front/header.php");
echo '<main class="padding_login">';

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo '<div class="alert-success" style="color: green; text-align:center; padding:10px;">
            ✅ L\'inscription a été effectuée avec succès !
          </div>';
}

include($racine_path . "templates/front/login.php");
echo '</main>';
include($racine_path . "templates/front/footer.php");
?>

