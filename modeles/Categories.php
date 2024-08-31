<?php

// classe categorie : gestion des objets categorie

class categorie extends _model {

    // table de la bdd
    protected $table = "categorie";

    // attribut à valoriser
    protected $fields = ["title" => "txt", "image" => "TXT"];
}