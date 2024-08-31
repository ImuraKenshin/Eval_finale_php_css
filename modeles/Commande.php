<?php

// classe commande : gestion des objets commande

class commande extends _model {

    // table de la bdd
    protected $table = "commande";

    // attribut à valoriser
    protected $fields = ["panier" => "json", "debut" => "TXT", "etat" => "LINK"];

    // Lien à valoriser
    protected $links =["etat" => "etat"];
}