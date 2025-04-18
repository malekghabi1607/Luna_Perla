<?php
session_start();

$base_url = "/~uapv2500231/Luna_Perla";

// ✅ Vérifie si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    // ✅ Redirige vers la route propre de la page compte utilisateur
    header("Location: <?= $base_url ?>/compte");
    exit;
} else {
    // ✅ Redirige vers la route propre de la page de login
    header("Location: <?= $base_url ?>/login");
    exit;
}
?>