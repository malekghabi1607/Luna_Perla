<?php
/**
 * @file best-sellers.php
 * @version 1.0
 * @date 2025-04-08
 * @description 
 * Affiche une sélection des produits les plus vendus.
 * Sert à mettre en avant les produits populaires auprès des utilisateurs.
 */

 session_start();

$racine_path = '../';
$titre = 'Best-Sellers';

$base_url = "/~uapv2500231/Luna_Perla";

// ✅ Inclure les composants de la page
include($racine_path . "templates/front/header.php");
include($racine_path . "templates/front/best-sellers.php");
include($racine_path . "templates/front/footer.php");
?>