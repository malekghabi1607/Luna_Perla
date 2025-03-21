<?php
// Connexion à la base de données PostgreSQL
$host = "localhost";
$dbname = "etd";
$user = "uapv2401806";
$password = "jrNija";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>