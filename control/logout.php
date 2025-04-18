<?php
/**
 * @file logout.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Ce fichier gère la déconnexion de l'utilisateur :
 * il supprime la session en cours, vide les cookies nécessaires,
 * puis redirige vers la page de connexion.
 */

session_start();

$base_url = "/~uapv2500231/Luna_Perla";

// Supprimer toutes les variables de session
$_SESSION = [];

// Détruire la session
session_destroy();
setcookie('accept_cookie', '', time() - 3600, '/');

// ✅ Rediriger proprement vers l'URL réécrite /login
header("Location: $base_url/login");
exit;
?>