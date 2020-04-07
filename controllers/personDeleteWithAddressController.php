<?php

//Récupération de l'id de la personne à supprimer
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//obtention d'une instance de PDO
$pdo = getPDO();

//Suppression des adresses de la personne
$sql = "DELETE FROM addresses WHERE person_id = ?";

//Préparation de la requête
$statement = $pdo->prepare($sql);

//Exécution de la requête en passant le paramètre
$statement->execute([$id]);

//Suppression de la personne
$sql = "DELETE FROM persons WHERE id = ?";

//Préparation de la requête
$statement = $pdo->prepare($sql);

//Exécution de la requête en passant le paramètre
$statement->execute([$id]);

//redirection vers la liste des personnes
header("location:/?page=personList");