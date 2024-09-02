<?php
// controleur

// Rôle : initialiser la session de l'utilisateur
// paramètres : $_post : valeur du formulaire de connexion


// initialisation
include "utils/init.php";

$identifiant = $_POST["nom"];
$mdp = $_POST["mdp"];

$utilisateur = new utilisateur();
$listeComptes = $utilisateur->listAll();


// pour chaque compte de la bdd
foreach ($listeComptes as $compte){
    // si l'identifiant de $_post correspond au champ pseudo d'un compte
    if ($compte->get("nom") === $identifiant && password_verify($mdp, $compte->get("mdp")) ){
        //je connecte l'utilisateur à la session
        session_connect($compte->getId());
    }
}

// affichage
if(session_isconnected()){
    include "templates/pages/accueil.php";
}else{
    include "templates/pages/connexion.php";
}