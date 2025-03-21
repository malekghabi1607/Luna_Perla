<?php

$titre = 'Connexion';
$racine_path = '../';

// Inclusion de l'en-tête du front-office
include($racine_path . "templates/front/header.php");

echo '<main class="padding_login">';

include($racine_path . "templates/front/login.php");

echo '</main>';

include($racine_path . "templates/front/footer.php");
?>