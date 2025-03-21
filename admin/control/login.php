<?php
/*
 * Fichier principal pour la page de connexion
 * Ce fichier inclut l'en-tête, le contenu principal (login) et le pied de page.
 */

// Définition du titre de la page et du chemin racine (adapter à l'arborescence)
$titre = 'Connexion';
$racine_path = '../';

// Inclusion de l'en-tête du back-office
include($racine_path . "templates/back/header.php");

// Ouverture de la section principale avec la classe "padding_login"
echo '<main class="padding_login">';

// Inclusion du contenu spécifique de la page de connexion
include($racine_path . "templates/back/login.php");

// Fermeture de la balise <main>
echo '</main>';

// Inclusion du pied de page du back-office
include($racine_path . "templates/back/footer.php");
?>