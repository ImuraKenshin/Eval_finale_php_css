<?php

// classe enca : gestion des objets enca

class enca extends _model {

    // table de la bdd
    protected $table = "enca";

    // attribut à valoriser
    protected $fields = ["nom" => "TXT","descritpion"=>"TXT", "prix" => "NUM", "image" => "TXT","etat" => "BOOL"];}