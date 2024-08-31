<?php
// contrôleur

// Rôle : afficher la page accueil des admins

// Paramètres : néant

// templates : accueil_admin.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
//néant

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/accueil_admin.php";
}else{
    include "templates/pages/connexion.php";
}
