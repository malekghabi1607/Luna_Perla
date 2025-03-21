<?php
$racine_path = '../';
$titre = 'Collection';


// Définition de la liste des produits
$products = [
    ["id" => 1, "name" => "Collier Sautoir - JOANA", "price" => "26", "image" => "images/collier-joana-1.jpg"],
    ["id" => 2, "name" => "Bague - INES", "price" => "19", "image" => "images/bague-ines-1.jpg"],


];

// Inclure le header et le template
include($racine_path . "templates/front/header.php");
include($racine_path . "templates/front/collection.php");
include($racine_path . "templates/front/footer.php");
?>