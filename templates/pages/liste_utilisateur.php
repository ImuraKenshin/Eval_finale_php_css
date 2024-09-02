<?php

// templates de pages complètes : liste des utilisateur

// Paramètres : $liste : tableau simple d'objet utilisateur

// liens :
    // ajouter un utilisateur : afficher_form_ajout_utilisateur
    // changer mot de passe : afficher_form_mot_de_passe.php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Liste des utilisateurs</h1>

    <div class="container div_bouton">
        <a href="afficher_form_ajout_utilisateur.php" title=""><button>Ajouter un utilisateur</button></a>
    </div>

    <div class="table_utilisateur">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Rôle</th>
                    <th>Mot de passe</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($liste as $utilisateur){
                ?>
                        <tr>
                            <td> <?= htmlentities($utilisateur->get("nom"))  ?> </td>
                            <td> <?= htmlentities($utilisateur->get("prenom"))  ?> </td>
                            <td> <?= htmlentities($utilisateur->getTarget("role")->get("libelle"))  ?> </td>
                            <td><a href="afficher_form_mot_de_passe.php?id=<?=$utilisateur->getId()?>"><button>Changer le mot de passe</button></a></td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>


    

</body>
</html>