<?php

//Requête sur l'ensemble des personnes
$pdo = getPDO();
$sql = "SELECT p.id, person_name, first_name, zip_code, city
        FROM persons AS p JOIN adresses ON p.id = person_id";

$request = $pdo->query($sql);

$personList = $request->fetchAll();

//Paramètres de la vue
$pageTitle = "Liste des personnes";
$content = "../views/personList.php";

//Affichage de la vue
require "../views/baseLayout.php";

