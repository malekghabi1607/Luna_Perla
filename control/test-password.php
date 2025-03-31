<?php
// 🔐 Mot de passe à chiffrer
$mot_de_passe = "bijoux2025!";

// Génération du hash sécurisé
$hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

// Affichage
echo "<h2>Hash généré pour le mot de passe : <em>$mot_de_passe</em></h2>";
echo "<p><strong>Copie ce hash :</strong></p>";
echo "<textarea cols='100' rows='2'>" . $hash . "</textarea>";
?>
