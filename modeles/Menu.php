<?php

// classe menu : gestion des objets menu

class menu extends _model {

    // table de la bdd
    protected $table = "menu";

    // attribut à valoriser
    protected $fields = ["nom" => "TXT","descritpion"=>"TXT", "prix" => "NUM", "image" => "TXT","etat" => "BOOL"];}