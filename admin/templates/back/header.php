<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Inclusion du meta tag pour le viewport (essentiel pour la réactivité) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Métadonnées -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Titre de la page, affichant le titre défini en PHP ou un titre par défaut -->
    <title><?php echo isset($titre) ? $titre : "Luna Perla - Bijoux"; ?></title>

    <!-- Inclusion du framework Bootstrap (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <!-- Inclusion du bundle Bootstrap (JS) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Inclusion de Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Inclusion des styles CSS personnalisés -->
    <link rel="stylesheet" href="/~uapv2401806/Luna_Perla/admin/templates/back/css/template.css">
</head>

<body>
    <!-- Header principal du site -->
    <header>
        <!-- Inclusion du menu de navigation -->
        <?php include("menu.php"); ?>
    </header>

