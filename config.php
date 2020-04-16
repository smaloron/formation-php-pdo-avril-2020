<?php

//Infos de connexion à la base de données
define("DSN", "mysql:host=mysql-m2i-smaloron.alwaysdata.net;dbname=m2i-smaloron_formation;charset=utf8");
define("DB_USER", "204352_web");
define("DB_PASS", "UnDeux3");

//Liste des liens de la barre de navigation
$navbarLinks = [
    "Liste de personnes" => "personList",
    "Contact" => "contact",
    "Test PDO" => "pdo",
    'Produits' => "product"
];