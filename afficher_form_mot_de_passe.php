<?php
// contrôleur

// Rôle : afficher le formulaire d'affectation de mot de passe

// Paramètres : néant

// templates : form_mot_de_passe.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
//néant

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/form_mot_de_passe.php";
}else{
    include "templates/pages/connexion.php";
}