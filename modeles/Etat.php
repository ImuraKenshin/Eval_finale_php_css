<?php

// classe etat : gestion des objets etat

class etat extends _model {

    // table de la bdd
    protected $table = "etat";

    // attribut à valoriser
    protected $fields = ["libelle" => "txt"];
}