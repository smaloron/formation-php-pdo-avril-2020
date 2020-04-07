<?php

//Le formulaire a-t-il été envoyé
$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    //récupération de la saisie
    $person = filter_input(INPUT_POST, "person", 
                           FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $address = filter_input(INPUT_POST, "address", 
                            FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);


    //Insertion dans la base de données
    $pdo = getPDO();
    //insertion de la personne

    $sql = "INSERT INTO persons (first_name, person_name, profession)
            VALUES (:firstName, :personName, :profession)";
    
    $statement = $pdo->prepare($sql);
    $statement->execute($person);

    //récupération de l'identifiant de la nouvelle personne
    $personId = $pdo->lastInsertId();

    //Insertion de l'adresse
    $sql = "INSERT INTO addresses (address, zip_code, city, person_id)
            VALUES (:street, :zipCode, :city, :personId)";

    //injection de l'id dans les données de la requête
    $address["personId"] = $personId;

    $statement = $pdo->prepare($sql);
    $statement->execute($address);

    //Redirection vers la liste des personnes
    header("location:/?page=personList");
}




//Affichage du formulaire
$pageTitle = "Nouvelle personne";
$content = "../views/personForm.php";

require "../views/baseLayout.php";