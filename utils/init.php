<?php

// fichier à inclure en début de tous les contrôleurs, pour initialiser l'environnement


// gestion des messages d'erreur
ini_set("display_errors", 1);       // Aficher les erreurs
error_reporting(E_ALL);             // Toutes les erreurs



// ouverture de la base de données ( dans la variable globale $bdd)
// on va stocker l'objet base de données ouvert dans une variable globale
global $bdd;    // Les variables sont dans $GLABALS["bdd"]


// new PDO (chaine de connexion, login, mot de passe)
$bdd = new PDO("mysql:host=localhost;dbname=projets_concert_fdumont;charset=UTF8", "fdumont", "N+o4GPc5j!G");
// cette commande plante et termine le programme (erreur fatale) en cas d'erreur dans les paramètres
// pour verifier : print_r($bdd);

// pour debugger, on peut ajouter une propriété
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

/*
*******************************************************************************************
***************************récupération des données / traitements**************************
*******************************************************************************************
*/

include "./utils/model.php";
include "./modeles/Boissons.php";
include "./modeles/Burgers.php";
include "./modeles/Categories.php";
include "./modeles/Commandes.php";
include "./modeles/Desserts.php";
include "./modeles/Encas.php";
include "./modeles/Etats.php";
include "./modeles/Frites.php";
include "./modeles/Menus.php";
include "./modeles/Roles.php";
include "./modeles/Salades.php";
include "./modeles/Sauces.php";
include "./modeles/Utilisateurs.php";
include "./modeles/Wraps.php";


// Activer le mecanisme de session
include "utils/session.php";
session_activation();