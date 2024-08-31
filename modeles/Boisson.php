<?php

// classe boisson : gestion des objets boisson

class boisson extends _model {

    // table de la bdd
    protected $table = "boisson";

    // attribut à valoriser
    protected $fields = ["nom" => "TXT","descritpion"=>"TXT", "prix" => "NUM", "image" => "TXT","etat" => "BOOL"];
}