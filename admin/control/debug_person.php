<?php
require_once('../../model/GestionBD.php');
use bd\GestionBD;
$base_url = "/~uapv2500231/Luna_Perla";

$BD = new GestionBD();
$BD->connexion();

$stmt = $BD->pdo->query("SELECT id, username, email, role FROM person_lp");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
foreach ($users as $user) {
    echo "ID: {$user['id']} - Username: {$user['username']} - Email: {$user['email']} - Role: {$user['role']}\n";
}
echo "</pre>";

$BD->deconnexion();
?>