<?php
// contrôleur

// Rôle : enregistrer un nouveau menu

// Paramètres : $_POST : nom, description, prix
            //  $_Files : image

// templates : accueil_admin.php


// initiation
include "utils/init.php";
include "utils/verif_connexion.php";

// traitement des paramètres
$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$chemin = "images/burgers";
$nomImage = $_FILES["image"]["name"] . "-" . uniqid();

// traitement des données
$utilisateur = new utilisateur(session_idconnected());

$menu = new menu();

if($menu->envoyer_image($chemin, $nomImage)){
    $menu->set("nom", $nom);
    $menu->set("description", $description);
    $menu->set("prix", $prix);
    $menu->set("image", $nomImage);
    $menu->set("etat", true);
    $menu->insert();
}else{
    
    include "templates/pages/form_ajout_menu.php";
    exit;
}



// affichage final
if ($utilisateur->getTarget("role")->get("libelle") == "administrateur") {
    include "templates/pages/accueil_admin.php";
}else{
    include "templates/pages/connexion.php";
}