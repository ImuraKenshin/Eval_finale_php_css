<?php

// classe role : gestion des objets role

class role extends _model {

    // table de la bdd
    protected $table = "role";

    // attribut à valoriser
    protected $fields = ["libelle" => "txt"];
}