<?php

// classe salade : gestion des objets salade

class salade extends _model {

    // table de la bdd
    protected $table = "salade";

    // attribut à valoriser
    protected $fields = ["nom" => "TXT","descritpion"=>"TXT", "prix" => "NUM", "image" => "TXT","etat" => "BOOL"];}