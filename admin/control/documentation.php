<?php
session_start();

$base_url = "/~uapv2500231/Luna_Perla";

if (!isset($_SESSION['admin_id'])) {
    echo "<script>alert('❌ Vous n\'êtes pas connecté en tant qu\'administrateur.');</script>";
    header("Location: $base_url/admin");
    exit;
}

$racine_path = '../../';
$racine_path1 = '../';

$titre = 'Documentation Client';

include($racine_path1 . "templates/back/header.php");

include($racine_path1 . "templates/back/documentation.php");

include($racine_path1 . "templates/back/footer.php");