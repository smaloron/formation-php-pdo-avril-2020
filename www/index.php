<?php
//Inclusion de la configuration de l'application
require "../config.php";

//Inclusion de la librairie des outils de gestion de base de données
require "../libs/database.php";


//Récupération du contrôleur demandé
$controller = filter_input(INPUT_GET, "page") ?? "home";

//Constitution du chemin vers le fichier contrôleur
$url = "../controllers/{$controller}Controller.php";

//Si le fichier n'existe pas afficher un contrôleur d'erreur
if(! file_exists($url)){
    $errorMessage = "Contrôleur introuvable";
    $url = "../controllers/errorController.php";
}

//Exécution du contrôleur
require $url;