<?php
// programme à inclure dans les contrôleurs qui ont besoin de la connexion

// si on n'est pas connecté : rediriger / afficher le formulaire de connexion

if ( ! session_isconnected()){
    include "templates/pages/connexion.php";
    exit;
}