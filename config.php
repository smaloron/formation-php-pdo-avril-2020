<?php

//Infos de connexion à la base de données
define("DSN", "mysql:host=localhost;dbname=formation_php;charset=utf8");
define("DB_USER", "root");
define("DB_PASS", "");

//Liste des liens de la barre de navigation
$navbarLinks = [
    "Liste de personnes" => "personList",
    "Contact" => "contact",
    "Test PDO" => "pdo",
    'Produits' => "product"
];