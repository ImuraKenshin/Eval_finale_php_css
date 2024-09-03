<?php

// templates de pages complètes : page d'accueil admin

// Paramètres : néant

// liens :
    // liste utilisateur : afficher_liste_utilisateur.php
    // liste commande : afficher_liste_commande.php
    // menu: afficher_form_ajout_menu.php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil administrateur</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Accueil administrateur</h1>

    <div class="container div_bouton">
        <a href="afficher_liste_utilisateur.php" title="liste utilisateur"><button>Liste utilisateur</button></a>
        <a href="afficher_liste_commande.php" title="liste des commandes"><button>Liste des commandes</button></a>
        <a href="afficher_form_ajout_menu.php" title="nouveau menu"><button>Nouveau menu</button></a>
    </div>


    

</body>
</html>