<?php
/*
 * Définition du titre de la page et du chemin racine
 */
session_start();
$titre = 'Accueil';
$racine_path = '../';

$base_url = "/~uapv2500231/Luna_Perla";


// Inclusion du header situé dans le dossier "templates/back"
include($racine_path . 'templates/back/header.php');

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

// Inclusion du footer situé dans le dossier "templates/back"
include($racine_path . 'templates/back/footer.php');
?>
