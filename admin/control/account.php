<?php
session_start();
$base_url = "/~uapv2500231/Luna_Perla";

echo "COUCOU" . $_SESSION['admin_id'];

// Vérifie si l'utilisateur est connecté
if (isset($_SESSION['admin_id'])) {
    // Redirige vers la page utilisateur
    header("Location: $base_url/admin/compte");
    exit;
} else {
    // Sinon, redirige vers la page de connexion
    header("Location: $base_url/admin/login");
    exit;
}
?>