<?php

// classe utilisateur : gestion des objets utilisateur

class utilisateur extends _model {

    // table de la bdd
    protected $table = "utilisateur";

    // attribut à valoriser
    protected $fields = ["nom" => "txt", "prenom" => "TXT", "mdp" =>"TXT", "role" => "LINK", "etat" => "NUM"];

    // Lien à valoriser
    protected $links =["role" => "role"];
}