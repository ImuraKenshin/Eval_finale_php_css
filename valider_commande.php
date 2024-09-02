<?php
// contrôleur

// Rôle : modifier l'état d'une commande

// Paramètres : id de la commande

// templates : liste_commande.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
$id = $_GET["id"];

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

$commande = new commande($id);

$commande->set("etat", 2);
$commande->update();

// affichage final
$liste = $commande->listAll("-id");
if ($utilisateur->getTarget("role")->get("libelle") == "preparateur") {
    include "templates/pages/liste_commande.php";
}else{
    include "templates/pages/connexion.php";
}