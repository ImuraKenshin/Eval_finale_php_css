<?php
// contrôleur

// Rôle : afficher la liste des commandes

// Paramètres : néant

// templates : liste_commande.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
//néant

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

$commande = new commande();
$liste = $commande->listAll("-id");

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur" || $utilisateur->getTarget("role")->get("libelle") == "preparateur") {
    include "templates/pages/liste_commande.php";
}else{
    include "templates/pages/connexion.php";
}