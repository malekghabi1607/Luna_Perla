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

$titre = 'FAQ - Gestion et Consultation';

require_once($racine_path . "model/Contact_lp.php");
require_once($racine_path . "class/Contact_lp.php");

use bd\Contact_lp as ContactModel;

$faqModel = new ContactModel();
$faq_items = $faqModel->getAllContacts();

include($racine_path1 . "templates/back/header.php");

echo '<main class="faq-container">';
include($racine_path1 . "templates/back/carte_FAQ.php");
echo '</main>';

include($racine_path1 . "templates/back/footer.php");