<?php

// classe sauce : gestion des objets sauce

class sauce extends _model {

    // table de la bdd
    protected $table = "sauce";

    // attribut à valoriser
    protected $fields = ["nom" => "TXT","descritpion"=>"TXT", "prix" => "NUM", "image" => "TXT","etat" => "BOOL"];}