<?php

class _model {

    // description du modèle d'attribut

    protected $table = "";
    protected $fields = [];

    protected $links = [];   

    // définition d'un objet précis

    protected $id = 0;
    protected $values =[];
    protected $targets =[];

    // constructeur


    /**
     * Rôle : charger l'objet correspondant à l'id passé en paramètre
     * Paramètres : id de l'objet à charger
     * retour : aucun
     */
    function __construct ($id = null){
        // si l'id existe
        if(! is_null($id)){
            // charger l'objet
            $this->load($id);
        }
    }


/*
***************************************************************************************
**************************************METHODES*****************************************
***************************************************************************************
*/

    /**
     * Rôle : contrôler si l'objet est chargé
     * Paramètres : aucun
     * retourne true si chargé
     */
    function is(){
        // on vérifie que l'attribut id est non vide
        return ! empty($this->id);
    }

    /**
     * Rôle : chargement d'un objet
     * Paramètres : id de l'objet à charger
     * retourne true si l'objet est chargé
     */
    function load ($id){
        // je prépare ma requête
        $sql = "SELECT";
        // je génère un tableau contenant le nom des champs de ma table
        $tableau = [];
        foreach($this->fields as $nomChamp => $type) {
            $tableau[] = "`$nomChamp`";
        }
        $sql .= implode(",", $tableau);
        // j'indique la table dans laquelle les données de l'objet se trouve
        $sql .= "FROM `$this->table`";
        // je cherche l'objet que je souhaite charger
        $sql .= "WHERE `id` = :id";

        // je valorise mon paramètre :xx
        $param = [":id" => $id];

        // je prépare et j'éxécute ma requête sql
        global $bdd;
        $req = $bdd->prepare($sql);
        if(! $req->execute($param)) return false ;

        // je range les données dans une variable
        $liste = $req->fetchAll(PDO::FETCH_ASSOC);

        // dans le cadre ou la liste serait vide :
        if(empty($liste)) return false;

        $objet = $liste[0];

        // je valorise l'objet
        foreach($this->fields as $nomChamp => $type) {
            $this->values[$nomChamp] = $objet[$nomChamp];
        }

        // je renseigne son id
        $this->id = $id;

        // on a dis que la fonction devait retourner un true en cas de réussite
        return true;
    }

    /**
     * Rôle : initialiser l'objet depuis le tableau de donnée du fectch
     * Paramètres : $liste : tableau valorisant les champs de l'objet
     * retourne true si réussit
     */
    function loadFromTab ($liste){
        // je vérifie que mon objet est bien chargé dans ma liste
        if(isset($liste["id"])) $this->id = true;

        // je valorise mes champs avec leur valeur dans la table
        foreach ($this->fields as $nomChamp => $type) {
            // si le champ existe dans la liste des champs, je le valorise dans mon objet
            if (isset($liste[$nomChamp])) $this->values[$nomChamp] = $liste[$nomChamp];
        }
        return true;
    }


    /**
     * Rôle : donner la liste de tous les objets de cette classe
     * paramètres : gérer les critères de tri
     *      je peux mettre autant de paramètres que de critères de tri, 
     *     chaque paramètre est le nom du champ précédé de - pour un tri descedant et de + pour un tri ascendant
     *  $tris : je donne les paramètres séparés par une virgle à l'appel, 
     * retour : liste d'objet de la classe courante, indexées par les id
     */
    function listAll(...$tris) {

        // je construit la requête SQL, et ses paramètres

        $sql = "SELECT `id`,"; 
        // je contruit la liste des champs encadrés par ` `
        $tableau = [];
        foreach($this->fields as $nomChamp => $type) {
            $tableau[] = "`$nomChamp`";
        }
        $sql .= implode(", ", $tableau);

        $sql .= "FROM `$this->table`";

        // je construit la liste des critères de tri
        $tabOrder = [];
        foreach($tris as $tri) {
            // tri : +nomChamp ou - nomChamp ou nomChamp
            // je récupère le premier caractère pour tester si il s'agit d'un -, d'un + ou autre chose
            // et je récupère le nom de mon champ en retirant le premier caractère si il s'agit de - ou +
            $Lettre1 = substr($tri, 0, 1);
            if ($Lettre1 === "-") {
                $ordre = "DESC";
                $nomField = substr($tri, 1);
            } else if ($Lettre1 === "+") {
                $ordre = "ASC";
                $nomField = substr($tri, 1);
            } else {
                $ordre = "ASC";
                $nomField = $tri;
            }
            // je rajoute dans mon tableau le nom du champ et son tri
            $tabOrder[] = "`$nomField` $ordre";
        }
        if (!empty($tabOrder))  $sql .= " ORDER BY " . implode(",", $tabOrder);

        // préparer / exécuter
        global $bdd;
        $req = $bdd->prepare($sql);
        if ( ! $req->execute()) {
            // Echec de la requête
            return [];
        }

        // je construit le tableau de résultat
        $result = [];
        // tant que j'ai une ligne de résultat de la requête à lire
        while ($tabObject = $req->fetch(PDO::FETCH_ASSOC)) {
            // "transférer" $tabObject en objet de la classe courante
            // Récupérer le nom de la classe de l'objet courant
            $classe = get_class($this);
            $obj = new $classe();
            // Charger l'objet
            $obj->loadFromtab($tabObject);
            $obj->setId($tabObject["id"]);
            // ajouter dans $result
            $result[$obj->getId()] = $obj;
        }

        return $result;


    }

    /**
     * Rôle : création du contact courant dans la base de données
     * paramètres : néant
     * retour : true si réussi, false si échoué
     */
    function insert() {

        // Créer la requête : INSERT INTO
        // j'utilise la méthode méthode makeRequestSet qui me renvoit la liste des champs de l'objet
        // makeRequestParamForSet me renvoit les paramètres de la requête
        $sql = "INSERT INTO `$this->table`SET " . $this->makeRequestSet();
        $param  = $this->makeRequestParamForSet();

        // je prépare la requête
        global $bdd;
        $req = $bdd->prepare($sql);

        //  - j'exécute cette requête
        if ( ! $req->execute($param)) {
            // Erreur sur la requête
            return false;
        }

        // j'enregistre le nouvel id avec la fonction lastInsertId() de PHP
        $this->id = $bdd->lastInsertId();

        return true;

    }


    /**
     * Rôle : mettre à jour l'objet courant dans la base de données
     * Paramètres : néant
     * Retour : true si réussi, false si échoué
     */
    function update() {
        // bien penser à rajouter l'id pour la séléction de l'objet à modifier dans les paramètres de la requête


        $sql = "UPDATE  `$this->table` SET " . $this->makeRequestSet() . " WHERE `id` = :id ";
        $param = $this->makeRequestParamForSet();
        $param[":id"] = $this->id;
           

        // je prépare la requête
        global $bdd;
        $req = $bdd->prepare($sql);

        //  j'exécute cette requête
        if ( ! $req->execute($param)) {
            // Erreur sur la requête
            return false;
        }

        return true;

    }

    /**
     * Rôle : construire la partie d'une requête de mise à jour ou de création valorisant les champs
     * paramètres : néant
     * Retour : le texte à mettre derrère SET dans une requête SQL
     */
    function makeRequestSet() {

        // On a des bouts de texte ( `nomChamp` = :nomChamp) à fabriquer (un pour chaque champ ), et à les séparer par ,
        // Une solution est de :
        //          - fabriquer un tableau simple contenant les bouts de texte
        //          - utiliser implode pour générer la chaine de caractère finale avec les séprateurs
        
        // Fabrique un tableau simplde des bouts de texte ( `nomChamp` = :nomChamp) 
        $tableau = $this->makeTableauSimpleSet();

        // Générer le texte final :
        return implode(", ", $tableau);


    }

    /**
     * Rôle : faire un tableau contenant pour chaque champ, un élément avec le texte `nomChamp` = :nomChamp
     * paramètres : néant
     * Retour : le tableau décrit ci-dessus
     */
    function makeTableauSimpleSet() {
        
        // je pars d'un tableau vide
        $result = [];

        // Pour chaque champ : j'ajoute dans $result un élément `nomChamp` = :nomChamp
        foreach($this->fields as $nomChamp => $type) {
            // le nom du champ est disponible dans $nomchamp
            $result[] = "`$nomChamp` = :$nomChamp";
        }
        return $result;

   
    }

    /**
     * Rôle : préparer (et retourner) le tableau de valorisation des paramètres pour mise à jour des champs
     * Paramètres : néant
     * Retour : le tableau contenant les valeurs associées aux :nomChamp (pour chaque champ)
     */
    function makeRequestParamForSet() {


        // Je doit faire un tableau, qui a un élément pour chaque champ (du modèle conceptuel) de la table
        //      pour le champ dont le nom est nomChamp, l'élément du tabelau résultat à pour valeur la valeur courant du champ
        //         et pour index le caractère : suivi du nom du champ
        // Pour chaque champ : il faut parcourir la liste des champs : attribut fields ($this->fields)
        $result = [];   
        foreach($this->fields as $nomChamp => $type) {
            // je doit ajouter dans le tableau result l'index :nomChamp avecla valeur du champ
            // je doit construire $result[":nomChamp"] = valeurDuChamp;
            $index = ":$nomChamp";          
            // Valeur : elle est dans le tableau des valeurs, l'attribut values ($this->values)
            // Si j'ai une valeur pour $nomChamp, je crée l'élément de tableau avec cette valeur,
            // Sinon, je crée avec null
            if (isset($this->values[$nomChamp])) {
                $result[$index] = $this->values[$nomChamp];
            } else {
                $result[$index] = null;
            }
        }

        return $result;

    }

    /**
     * Rôle : supprimer l'objet courant dans la base de données
     * Paramètres : néant
     * Retour : Ceux qui sont sur les cp
     */
    function delete() {

        // Je crée ma requête pour cibler l'objet que je souhaite supprimer avec son id
        $sql = "DELETE FROM `$this->table` WHERE `id` = :id";
        $param = [":id" => $this->id];
    
        // je prépare ma requête
        global $bdd;
        $req = $bdd->prepare($sql);

        //  je l'éxecute
        if ( ! $req->execute($param)) {
            // Erreur sur la requête
            return false;
        }
        
        // Je vide l'objet avec un reset de l'id
        $this->id = 0;

        return true;

    }

    function envoyer_image($chemin, $nomImage){

        //répertoire de déstination
        $target_dir = $chemin;
        $target_file = $target_dir . basename($nomImage);
        //on initialise la variable update ok
        $uploadOk = 1;
        //on recup l'extention du fichier
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
         
        //on a cliqué sur le bouton qui s'appel submit
        if(isset($_POST["submit"])) {
            //fichier image?
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $message = "Le fichier n'est pas une image valide.";
                // echo $message;
                $uploadOk = 0;
            }
        }
        // le fichier existe déjà?
        if (file_exists($target_file)) {
            $message = "Erreur! le fichier image existe déjà.";
            // echo $message;
            $uploadOk = 0;
        }
        // le poid de l'image
        if ($_FILES["image"]["size"] > 5000000) {
            $message = "Le fichier selectionné est trop volumineux.";
            // echo $message;
            $uploadOk = 0;
        }
        // les formats autorisés
        if($imageFileType != "jpg" &&$imageFileType != "JPG"&& $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" && $imageFileType != "GIF") {
             
            $message = "Les images doivent etre au format: JPG, JPEG, PNG ou GIF.";
            // echo $message;
            $uploadOk = 0;
        }
        // erreur
        if ($uploadOk == 0) {
            $message = "Erreur! impossible d'ajouter l'image.";
            // echo $message;
             
        // tt c'est bien passé
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                 
                     
                    $message = "Image ajoutée avec succès.";
                         
                    // echo $message;
                     
            } else {
                $message = "Erreur inconnue! Merci de retenter l'ajout plus tard ou de contacter l'administrateur.";
                // echo $message;
            }
        }
        
    }

        /*
        ***************************************************************************************
        ***************************************GETTERS*****************************************
        ***************************************************************************************
        */

    
    /**
     * Rôle : récupérer la valeur d'un attribut
     * Paramètres : $fieldName : nom de l'attribut à valoriser
     * retourne la valeur de l'attribut ciblé
     */
    function get($fieldName){
        // je vérifie que la valeur existe bien dans mon objet
        if (isset($this->values[$fieldName])) return $this->values[$fieldName];
        // si il n'éxiste pas, je valorise ma valeur à vide pour le traitement des érreurs
        else return [ "NUM" => 0, "TXT" => "", "LINK" => 0][$this->fields[$fieldName]];
    }

    /**
     * Rôle : retourner un objet pointé par un champ
     * Paramètres : $fieldName : nom du champ
     * retourne un objet de la classe _model chargé avec l'objet pointé
     */
    function getTarget($fieldName){
        // je vérifie si mon objet est déja enregistrer dans $targets
        if (isset($this->targets[$fieldName])) return $this->targets[$fieldName];

        // je contrôle si le champ est issu d'un lien
        if ( ! isset($this->links[$fieldName])) {
            // si le champ n'est pas issu d'un lien, on retourne un objet de la classe _model
            $this->targets[$fieldName] = new _model();
            return $this->targets[$fieldName];
        }

        // si le champs est issu d'un lien,  je récupère sa valeur
        $nomClasse = $this->links[$fieldName];
        $this->targets[$fieldName] = new $nomClasse($this->get($fieldName));

        return $this->targets[$fieldName];
    }


    /**
     * Rôle : récupérer l'id
     * Paramètres : néant
     * retourne l'id de l'objet chargé ou 0 si il n'y a pas d'objet correspondant
     */
    function getId(){
        return $this->id;
    }


        /*
        ***************************************************************************************
        ***************************************SETTERS*****************************************
        ***************************************************************************************
        */


    /**
     * Rôle : changer ou initialiser la valeur d'un attribut
     * Paramètres :
     * $fieldName : nom de l'attribut ciblé
     * $value : valeur à lui attribuer
     * retourne true si réussit
     */
    function set($fieldName,$value){
        $this->values[$fieldName] = $value;
        return true;
    }

    /**
     * Rôle : établir la valeur de l'id de l'objet
     * Paramètres : $id -> valeur à donner à l'id
     * retourne l'id de le objet après opération
     */
    function setId($id){
        return $this->id = $id;
    }
}