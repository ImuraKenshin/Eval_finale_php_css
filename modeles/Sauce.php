<?php

// classe sauce : gestion des objets sauce

class sauce extends _model {

    // table de la bdd
    protected $table = "sauce";

    // attribut à valoriser
    protected $fields = ["nom" => "txt", "prix" => "NUM", "image" => "TXT"];
}