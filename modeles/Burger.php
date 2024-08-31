<?php

// classe burger : gestion des objets burger

class burger extends _model {

    // table de la bdd
    protected $table = "burger";

    // attribut à valoriser
    protected $fields = ["nom" => "txt", "prix" => "NUM", "image" => "TXT"];
}