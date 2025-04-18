<?php
/**
 * @file obligations.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Affiche les mentions légales obligatoires du site.
 * Contenu statique avec mise en page simple.
 */session_start();

$base_url = "/~uapv2500231/Luna_Perla";

$racine_path = '../';
$titre = 'Les Obligations Légales';

// Chargement du header, contenu principal et pied de page
include($racine_path . "templates/front/header.php");
include($racine_path . "templates/front/obligations.php");
include($racine_path . "templates/front/footer.php");
?>