<?php
// contrôleur

// Rôle : modifier le mot de passe d'un utilisateur

// Paramètres : $_POST :  mot de passe

// templates : liste_utilisateur.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
$mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

$compte = new utilisateur($_GET["id"]);


$compte->set("mdp", $mdp);
$compte->update();

// affichage final
$liste = $compte->listAll();
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/liste_utilisateur.php";
}else{
    include "templates/pages/connexion.php";
}