<?php
// API

// Role : retourne sous format JSON la liste de tous les éléments à transmettre indexés par catégorie

// Paramètres : Néant

// Initialisation
include_once "utils/init.php";

// Traitement

$categorie = new categorie();
$categories = $categorie->listAll();

$menu = new menu();
$menus = $menu->listAll();

$boisson = new boisson();
$boissons = $boisson->listAll();

$burger = new burger();
$burgers = $burger->listAll();

$dessert = new dessert();
$desserts = $dessert->listAll();

$enca = new enca();
$encas = $enca->listAll();

$frite = new frite();
$frites = $frite->listAll();

$salade = new salade();
$salades = $salade->listAll();

$sauce = new sauce();
$sauces = $sauce->listAll();

$wrap = new wrap();
$wraps = $wrap->listAll();


// Je crée un tableau vide pour accueillir mes données et les indexés par la catégorie
$JSON = [];

// Pour chaque catégorie, je vais venir les rajouter au tableau en les indexant
foreach ($categories as $categorie) {
    $JSON["categorie"] = [
        "id" => $categorie->getId(),
        "title" => htmlentities($categorie->get("title")),
        "image" => htmlentities($categorie->get("image")),
    ];
}

foreach ($menus as $menu) {
    $JSON["menu"] = [
        "id" => $menu->getId(),
        "nom" => htmlentities($menu->get("nom")),
        "description" => htmlentities($menu->get("description")),
        "prix" => htmlentities($menu->get("prix")),
        "image" => htmlentities($menu->get("image")),
        "etat" => htmlentities($menu->get("etat")),
    ];
}

foreach ($boissons as $boisson) {
    $JSON["boisson"] = [
        "id" => $boisson->getId(),
        "nom" => htmlentities($boisson->get("nom")),
        "description" => htmlentities($boisson->get("description")),
        "prix" => htmlentities($boisson->get("prix")),
        "image" => htmlentities($boisson->get("image")),
        "etat" => htmlentities($boisson->get("etat")),
    ];
}

foreach ($burgers as $burger) {
    $JSON["burger"] = [
        "id" => $burger->getId(),
        "nom" => htmlentities($burger->get("nom")),
        "description" => htmlentities($burger->get("description")),
        "prix" => htmlentities($burger->get("prix")),
        "image" => htmlentities($burger->get("image")),
        "etat" => htmlentities($burger->get("etat")),
    ];
}

foreach ($desserts as $dessert) {
    $JSON["dessert"] = [
        "id" => $dessert->getId(),
        "nom" => htmlentities($dessert->get("nom")),
        "description" => htmlentities($dessert->get("description")),
        "prix" => htmlentities($dessert->get("prix")),
        "image" => htmlentities($dessert->get("image")),
        "etat" => htmlentities($dessert->get("etat")),
    ];
}

foreach ($encas as $enca) {
    $JSON["enca"] = [
        "id" => $enca->getId(),
        "nom" => htmlentities($enca->get("nom")),
        "description" => htmlentities($enca->get("description")),
        "prix" => htmlentities($enca->get("prix")),
        "image" => htmlentities($enca->get("image")),
        "etat" => htmlentities($enca->get("etat")),
    ];
}

foreach ($frites as $frite) {
    $JSON["frite"] = [
        "id" => $frite->getId(),
        "nom" => htmlentities($frite->get("nom")),
        "description" => htmlentities($frite->get("description")),
        "prix" => htmlentities($frite->get("prix")),
        "image" => htmlentities($frite->get("image")),
        "etat" => htmlentities($frite->get("etat")),
    ];
}

foreach ($salades as $salade) {
    $JSON["salade"] = [
        "id" => $salade->getId(),
        "nom" => htmlentities($salade->get("nom")),
        "description" => htmlentities($salade->get("description")),
        "prix" => htmlentities($salade->get("prix")),
        "image" => htmlentities($salade->get("image")),
        "etat" => htmlentities($salade->get("etat")),
    ];
}

foreach ($sauces as $sauce) {
    $JSON["sauce"] = [
        "id" => $sauce->getId(),
        "nom" => htmlentities($sauce->get("nom")),
        "description" => htmlentities($sauce->get("description")),
        "prix" => htmlentities($sauce->get("prix")),
        "image" => htmlentities($sauce->get("image")),
        "etat" => htmlentities($sauce->get("etat")),
    ];
}

foreach ($wraps as $wrap) {
    $JSON["wrap"] = [
        "id" => $wrap->getId(),
        "nom" => htmlentities($wrap->get("nom")),
        "description" => htmlentities($wrap->get("description")),
        "prix" => htmlentities($wrap->get("prix")),
        "image" => htmlentities($wrap->get("image")),
        "etat" => htmlentities($wrap->get("etat")),
    ];
}

echo json_encode($JSON);