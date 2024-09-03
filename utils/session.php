<?php

/*

fonction de gestion de la session

j'ai une super global $_SESSION
    -quand PHP est fini : elle est enregistrée
    -quand on lance un programme PHP (un controleur) : elle est restaurée

    on va gérer cette variable de la manière suivante:
    - l'index id contiendra 0 (ou n'existera pas ) quand aucun utilisateur n'est connecté
    - si un utilisateur est connecté $_SESSION["id"] contient l'id de l'utilisateur


    quand un utilisateur est connecté, je vais stocker l'objet associé dans la variable global $utilisateurConnecte
*/
 
/**
 * Rôle : active le mecanisme de session
 * paramètre : néant
 * retour true si connecté
 */
function session_activation(){
    // demarrer le mécanisme
    session_start();



    // si un utilisateur est connecté :
    if (session_isconnected()){
        //      - charger l'objet
        global $utilisateurConnecte;
        $utilisateurConnecte = new utilisateur(session_isconnected());
        //      - vérifier qu'il est actif, encore autorisé , ...
    }

    //retourner si on est connecté ou pas
    return session_isconnected();
}


/**
 * Rôle : dire si il y a une connexion active ou pas
 * paramètres : néant
 * retour true si connecté
 */
function session_isconnected (){
    return ! empty($_SESSION["id"]);
}


/**
 * Rôle : donne l'id de l'utilisateur connecté
 * paramètres : néant
 * retour id ou 0
 */
function session_idconnected(){
    if (session_isconnected()){
        return $_SESSION["id"];
    }
    else {
        return 0;
    }
    
}

/**
 * Rôle : donné l'objet correspondant à l'utilisateur connecté
 * Paramètres : néant
 * retour : un objet de la classe qui gère les utilisateurs
 */
function session_userconnected(){
    if (session_isconnected()){
        global $utilisateurConnecte;
        return $utilisateurConnecte;
    }
    else{
        return new utilisateur();
    }

}

/**
 * Rôle : déconnecter la session
 * Paramètres : néant
 * retour : true si réussit
 */
function session_deconnect(){

    $_SESSION["id"] = 0;
}

/**
 * Rôle : connecter un utilisateur
 * paramètres : id de l'utilisateur connecté
 * retour true si réussit
 */
function session_connect($id){

    $_SESSION["id"] = $id;
    
}