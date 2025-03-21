<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- 🏷️ Métadonnées -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($titre) ? $titre : "Luna Perla - Bijoux"; ?></title>

    <!-- 🎨 Framework Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <!-- 📌 Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- 🎨 Styles CSS personnalisés -->
    <link rel="stylesheet" href="<?php echo $racine_path . '/templates/front/css/template.css'; ?>">
</head>

<body>
    <!-- 🛠️ Header principal -->
    <header>
    
        <!-- 🎀 Menu de navigation -->
        <?php include("menu.php"); ?>
    </header>
</body>

</html>