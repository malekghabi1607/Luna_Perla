<?php
/*
 * Définition du titre de la page et du chemin racine
 */
$titre = 'Accueil';
$racine_path = '../';
?>

<?php
// Inclusion du header situé dans le dossier "templates/back"
include($racine_path . 'templates/back/header.php');
?>

<?php 
/*
 * Définition du contenu principal de la page sous forme de chaîne HTML
 * Ce contenu présente une section d'introduction avec texte et images
 */

/*
 * Définition du fil d'Ariane (breadcrumb) ou du contexte de la page
 */
$pageariane = 'Accueil';

/* Inclusion du template principal qui affichera le contenu défini dans $main */
include($racine_path.'templates/back/main.php');
?>

<?php
// Inclusion du footer situé dans le dossier "templates/back"
include($racine_path . 'templates/back/footer.php');
?>
