<?php
// contrôleur

// Rôle : enregistrer le nouvel utilisateur

// Paramètres : $_POST : nom, prenom , role, mot de passe

// templates : liste_utilisateur.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$role = $_POST["role"];
$mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

$compte = new utilisateur();

$compte->set("nom", $nom);
$compte->set("prenom", $prenom);
$compte->set("role", $role);
$compte->set("mdp", $mdp);
$compte->insert();

// affichage final
$liste = $compte->listAll();
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/liste_utilisateur.php";
}else{
    include "templates/pages/connexion.php";
}