<?php

// templates de pages complètes : page d'ajout d'un utilisateur

// Paramètres : $liste : liste des objets role



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de nouvel utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Formulaire d'ajout d'un utilisateur</h1>

    <div class="container div_form">
        <form action="ajouter_utilisateur.php" method="post" novalidate>

            <label>Nom : <br>
                <input type="text" name="nom" id="nom">
            </label>
            <br><br>
            <label>Prenom : <br>
                <input type="text" name="prenom" id="prenom">
            </label>
            <br><br>
            <label>Mot de passe : <br>
                <input type="password" name="mdp" id="mdp">
            </label>
            <br><br>
            <label>Role : <br>
                <select name="role" id="role">
                    <option value="">Choisissez un rôle</option>
                <?php
                    foreach ($liste as $role){
                ?>
                    <option value="<?= $role->getId() ?>"><?= $role->get("libelle") ?> </option>
                <?php
                    }
                ?>
                </select>
            </label>
            <br><br>

            <input type="submit" value="Enregistrer le nouvel utilisateur">
        </form>
    </div>



</body>
</html>