<?php
/*
 * Fichier principal pour la page de connexion
 * Ce fichier inclut l'en-tête, le contenu principal (login) et le pied de page.
 */

session_start(); // Démarrer la session pour vérifier la connexion

$titre = 'Connexion';
$racine_path = './';
$base_url = "/~uapv2500231/Luna_Perla";

// Rediriger si déjà connecté
if (isset($_SESSION['admin_id'])) {
    header("Location: control/dashboard.php");
    exit;
}

// sinon, afficher le formulaire de connexion
include($racine_path . "control/login.php");
?>

