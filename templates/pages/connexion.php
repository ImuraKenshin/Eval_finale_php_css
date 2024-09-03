<?php

// templates de pages complètes : page de connexion

// Paramètres : néant

// liens :
    // connexion : ouvrir_session.php

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


    <h1>Connexion</h1>

    <form action="ouvrir_session.php" method="POST" novalidate>
        <label for="nom"> Nom <br>
            <input type="text" name="nom" id="nom">
        </label>
        <br><br>
        <label for="mdp"> Mot de passe <br>
            <input type="password" name="mdp" id="mdp">
        </label>
        <br><br>
        <input type="submit" value="Se connecter">
    </form>

</body>
</html>