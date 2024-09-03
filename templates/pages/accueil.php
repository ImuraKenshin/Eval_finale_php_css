<?php

// templates de pages complètes : page d'accueil

// Paramètres : néant

// liens :
    // espace admin : afficher_accueil_admin.php
    // liste commande : afficher_liste_commande.php
    // caisse : afficher_form_commande.php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'acceuil</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Accueil</h1>

    <div class="container div_bouton">
        <a href="afficher_accueil_admin.php" title="espace admin"><button>Espace administrateur</button></a>
        <a href="afficher_liste_commande.php" title="liste des commandes"><button>Liste des commandes</button></a>
        <a href="afficher_form_commande.php" title="caisse"><button>Caisse</button></a>
    </div>



</body>
</html>