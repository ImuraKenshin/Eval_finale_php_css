<?php

// classe wrap : gestion des objets wrap

class wrap extends _model {

    // table de la bdd
    protected $table = "wrap";

    // attribut à valoriser
    protected $fields = ["nom" => "txt", "prix" => "NUM", "image" => "TXT"];
}