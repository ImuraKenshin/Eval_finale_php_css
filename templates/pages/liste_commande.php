<?php

// templates de pages complètes : liste des commande

// Paramètres : $liste : tableau simple d'objet commande

// liens :
    // détail d'une commande : afficher_detail_commande.php

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="description" content="...">
</head>
<body>

    <?php
    include "templates/fragments/header.php";
    ?>

    <h1>Liste des commandes</h1>


    <div class="container table_commande">
        <table>
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Date et heure</th>
                    <th>Etat</th>
                    <th>Détail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($liste as $commande){
                        if($commande->getTarget("etat")->get("libelle") == "preparation"){
                ?>
                        <tr>
                            <td> <?= htmlentities($commande->get("numero"))  ?> </td>
                            <td> <?= htmlentities($commande->get("debut"))  ?> </td>
                            <td> <?= htmlentities($commande->getTarget("etat")->get("libelle"))  ?> </td>
                            <td><a href="afficher_detail_commande.php?id=<?=$commande->getId()?>"><button>Détail</button></a></td>
                        </tr>
                <?php
                    }}
                ?>
            </tbody>
        </table>
    </div>


    

</body>
</html>