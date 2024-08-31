<?php
// contrôleur

// Rôle : afficher la liste des utilisateurs

// Paramètres : néant

// templates : liste_utilisateur.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
//néant

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/liste_utilisateur.php";
}else{
    include "templates/pages/connexion.php";
}