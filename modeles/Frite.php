<?php

// classe frite : gestion des objets frite

class frite extends _model {

    // table de la bdd
    protected $table = "frite";

    // attribut à valoriser
    protected $fields = ["nom" => "txt", "prix" => "NUM", "image" => "TXT"];
}