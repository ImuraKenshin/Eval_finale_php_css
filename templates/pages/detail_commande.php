<?php

// templates de pages complètes : detail d'une commande

// Paramètres : $commande : objet commande à afficher

// liens :
    // valider livraison commande : valider_commande.php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail commande </title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Detail commande n°<?=$commande->get("numero")?></h1>


    <div class="container panier_commande">
        
    </div>

    <?php
    if($utilisateur->getTarget("role")->get("libelle") == "preparateur"){
    ?>
    <div class="valider_commande">
        <a href="valider_commande.php?id=<?= $commande->getId() ?>" title=""><button>Valider la livraison</button></a>
    </div>
    <?php
    }
    ?>

</body>
</html>