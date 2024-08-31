<?php
// contrôleur

// Rôle : afficher le formulaire d'ajout d'un menu

// Paramètres : néant

// templates : form_ajout_menu.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
//néant

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/form_ajout_menu.php";
}else{
    include "templates/pages/connexion.php";
}