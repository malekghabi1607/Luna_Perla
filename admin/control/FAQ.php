<!-- Fichier principal pour la page FAQ (inclusion des éléments restants) -->

<?php
/*
 * Fichier : faq.php
 * Description : Ce fichier définit les données de la FAQ, inclut l'en-tête,
 * affiche le contenu principal via l'inclusion d'un template, puis inclut le pied de page.
 */

// Définition du chemin racine et du titre de la page
$racine_path = '../';
$titre = 'FAQ - Gestion et Consultation';

// Inclusion de l'en-tête du back-office
include($racine_path . "templates/back/header.php");

// Ouverture de la balise <main> avec la classe "faq-container"
echo '<main class="faq-container">';

// Définition des données de la FAQ sous forme de tableau associatif
$faq_items = [
    [
        'question' => "Comment ajouter un utilisateur ?",
        'answer'   => 'Pour ajouter un utilisateur, cliquez sur le bouton "Ajouter un utilisateur" dans la section de gestion des utilisateurs, remplissez le formulaire et validez.'
    ],
    [
        'question' => "Comment supprimer un utilisateur ?",
        'answer'   => 'Pour supprimer un utilisateur, cliquez sur le bouton "Supprimer" à côté de l\'utilisateur concerné dans la gestion des utilisateurs, puis confirmez la suppression.'
    ],
    [
        'question' => "Comment consulter un produit ?",
        'answer'   => 'Pour consulter un produit, cliquez sur le lien "Voir le bijou" dans la liste des produits pour accéder à la page détaillée du produit.'
    ]
];

// Inclusion du template qui affiche la FAQ (les questions et réponses)
include($racine_path . "templates/back/carte_FAQ.php");

// Fermeture de la balise <main>
echo '</main>';

// Inclusion du pied de page du back-office
include($racine_path . "templates/back/footer.php");

?>
