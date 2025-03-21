<?php
$racine_path = '../';
$titre = "Merci d'avoir pris contact avec nous";
include($racine_path . "templates/front/header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$subject = htmlspecialchars($_POST['subject']);
	$message = htmlspecialchars($_POST['message']);

	echo "<div class='confirmation-container'>";
	echo "<h2 class='confirmation-title'>Merci <strong>$name</strong>, votre message a bien été envoyé.</h2>";
	echo "<p class='confirmation-subject'><strong>Objet :</strong> $subject</p>";
	echo "<p class='confirmation-message'><strong>Message :</strong> $message</p>";
	echo "</div>";

} else {
	echo "<p style='color:red; text-align:center; font-size:18px;'>Erreur : aucune donnée reçue.</p>";
}

include($racine_path . "templates/front/footer.php");
?>