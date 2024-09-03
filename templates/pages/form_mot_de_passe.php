<?php

// templates de pages complètes : formulaire de changement de mot de passe

// Paramètres : $compte : objet utilisateur à modifier



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire de changement de mot de passe</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Formulaire de changement de mot de passe</h1>

    <div class="container div_mdp">
        <form action="attribuer_mot_de_passe.php?id=<?= $compte->getId() ?>" method="post" novalidate>

            <label>Nouveau mot de passe : <br>
                <input type="password" name="mdp" id="mdp">
            </label>
            <br><br>
            

            <input type="submit" value="Enregistrer le nouveau mot de passe">

        </form>
    </div>



</body>
</html>