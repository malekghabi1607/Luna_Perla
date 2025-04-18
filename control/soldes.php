<?php
session_start();

$racine_path = '../';
$titre = 'Soldes';

$base_url = "/~uapv2500231/Luna_Perla";

// Inclure les composants
include($racine_path . "templates/front/header.php");
include($racine_path . "templates/front/soldes.php");
include($racine_path . "templates/front/footer.php");
?>