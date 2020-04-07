<?php

//Requête sur l'ensemble des personnes
$pdo = getPDO();
$sql = "SELECT * FROM view_persons";

$request = $pdo->query($sql);

$personList = $request->fetchAll();

//Paramètres de la vue
$pageTitle = "Liste des personnes";
$content = "../views/personList.php";

//Affichage de la vue
require "../views/baseLayout.php";

