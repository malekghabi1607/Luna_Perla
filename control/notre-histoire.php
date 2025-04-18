<?php
/**
 * @file notre-histoire.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Page "À propos" qui raconte l'origine de Luna Perla.
 * Présente les valeurs et la mission de la marque.
 */

 session_start();

$base_url = "/~uapv2500231/Luna_Perla";

$racine_path = '../';
$titre = 'À Propos de Luna Perla';

// Chargement du header, contenu principal et pied de page
include($racine_path . "templates/front/header.php");
include($racine_path . "templates/front/notre-histoire.php");
include($racine_path . "templates/front/footer.php");
?>