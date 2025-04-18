<?php
/**
 * @file logout.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Déconnecte l’utilisateur en supprimant la session.
 * Redirige vers la page d’accueil ou de connexion.
 */

 session_start();

$base_url = "/~uapv2500231/Luna_Perla";

// Supprime toutes les variables de session
$_SESSION = [];

// Détruit la session
session_destroy();

// Redirige vers la page de connexion
header("Location: $base_url/admin");
exit;
?>