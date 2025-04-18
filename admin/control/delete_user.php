<?php
require_once('../../model/User_lp.php'); // User model
require_once('../../model/Person_lp.php'); // Person model (main identity)

$base_url = "/~uapv2500231/Luna_Perla";

use bd\User_lp;
use bd\Person_lp;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Optionally: delete from user_lp (though ON DELETE CASCADE should handle it)
    $userModel = new User_lp();
    $userModel->deleteUser($userId);  // Optional

    // Delete from person_lp (which will cascade delete from user_lp)
    $personModel = new Person_lp();
    $personModel->deletePerson($userId);

    header("Location: $base_url/admin/dashboard"); 
    exit;
} else {
    echo "ID utilisateur manquant ou invalide.";
}
?>