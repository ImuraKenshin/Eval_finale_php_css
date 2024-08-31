<?php
// contrôleur

// Rôle : afficher le formulaire d'ajout d'une commande

// Paramètres : néant

// templates : form_ajout_commande.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
//néant

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "caissier") {
    include "templates/pages/form_ajout_commande.php";
}else{
    include "templates/pages/connexion.php";
}