<?php

// templates de pages complètes : formulaire d'ajout d'un menu

// Paramètres : néant



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire d'ajout d'un menu</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Formulaire d'ajout d'un menu</h1>

    <div class="container div_menu">
        <form action="ajouter_menu.php" method="post" enctype="multipart/form-data" novalidate>

            <label>Nom du menu : <br>
                <input type="text" name="nom" id="nom">
            </label>
            <br><br>
            <label>Description : <br>
                <textarea name="description" id="description"></textarea>
            </label>
            <br><br>
            <label>Prix: <br>
                <input type="number" name="prix" id="prix">
            </label>
            <br><br>
            <label>Image : <br>
                <input type="file" name="image" id="image">
            </label>
            <br><br>

            <input type="submit" value="Enregistrer le menu">

        </form>
    </div>



</body>
</html>