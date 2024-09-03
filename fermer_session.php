<?php

// contrôleur

// rôle : déconnecter l'utilisateur actif

// paramètres : néant



// initialisation
include "utils/init.php";

// traitement des paramètres :
// néant

// traitement des données

session_deconnect();

// affichage final

include "templates/pages/accueil.php";