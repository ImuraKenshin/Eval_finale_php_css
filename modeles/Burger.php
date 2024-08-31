<?php

// classe burger : gestion des objets burger

class burger extends _model {

    // table de la bdd
    protected $table = "burger";

    // attribut à valoriser
    protected $fields = ["nom" => "TXT","descritpion"=>"TXT", "prix" => "NUM", "image" => "TXT","etat" => "BOOL"];}