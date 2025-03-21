<?php
/*
 * Définition du titre de la page et du chemin racine
 */
$titre = 'Accueil';
$racine_path = './';
?>

<?php
// Inclusion du header situé dans le dossier "templates/back"
include($racine_path . './templates/back/header.php');
?>

<?php 
/*
 * Définition du contenu principal de la page sous forme de chaîne HTML
 * Ce contenu présente une section d'introduction avec texte et images
 */
$main = '
<div class="website-intro">
    <h1>✨ Bienvenue chez Luna Perla ✨</h1>
    
    <div class="intro-content">
        <div class="intro-text">
            <p>Découvrez <strong>Luna Perla</strong>, votre boutique en ligne dédiée aux bijoux <em>élégants</em> et <em>intemporels</em>. 
            Nos créations en <strong>acier inoxydable</strong> sont conçues pour sublimer votre style tout en garantissant une <strong>durabilité exceptionnelle</strong>. 💎</p>
            
            <p>🌟 Avec une <strong>interface intuitive</strong> et une navigation fluide, explorez nos <strong>collections exclusives</strong>, 
            personnalisez vos bijoux et vivez une <strong>expérience d’achat sécurisée et raffinée</strong>.</p>
            
            <p>🛍️ Rejoignez l’univers <strong>Luna Perla</strong> et laissez-vous séduire par l’éclat de nos bijoux !</p>
        </div>
        
        <div class="intro-images">
            <img src="templates/back/images/bague-elegante.jpg" alt="Collection de bijoux Luna Perla">
            <img src="templates/back/images/collier-joana-1.jpg" alt="Bijoux élégants Luna Perla">
        </div>
    </div>
</div>';

/*
 * Définition du fil d'Ariane (breadcrumb) ou du contexte de la page
 */
$pageariane = 'Accueil';

/* Inclusion du template principal qui affichera le contenu défini dans $main */
include($racine_path.'templates/back/main.php');
?>

<?php
// Inclusion du footer situé dans le dossier "templates/back"
include($racine_path . 'templates/back/footer.php');
?>