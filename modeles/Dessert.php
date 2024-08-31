<?php

// classe dessert : gestion des objets dessert

class dessert extends _model {

    // table de la bdd
    protected $table = "dessert";

    // attribut à valoriser
    protected $fields = ["nom" => "txt", "prix" => "NUM", "image" => "TXT"];
}