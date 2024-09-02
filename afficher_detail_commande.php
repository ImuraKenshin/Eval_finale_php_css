<?php
// contrôleur

// Rôle : afficher le detail d'une commande

// Paramètres : id de la commande

// templates : detail_commande.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
$id = $_GET["id"];

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

$commande = new commande($id);

// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "preparateur") {
    include "templates/pages/detail_commande.php";
}else{
    include "templates/pages/connexion.php";
}