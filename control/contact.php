<?php
$racine_path = '../';
$titre = 'Formulaire de contact';

include($racine_path . "templates/front/header.php");

$action = $racine_path . "control/confirmation.php";
$method = "POST";

include($racine_path . "templates/front/contact.php");

include($racine_path . "templates/front/footer.php"); ?>