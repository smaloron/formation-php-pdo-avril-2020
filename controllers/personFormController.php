<?php
//Instance de PDO utilisée pour l'insertion d'une personne 
//et également pour la récupération de la liste des professions
$pdo = getPDO();

//Le formulaire a-t-il été envoyé
$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    //récupération de la saisie
    $person = filter_input(INPUT_POST, "person", 
                           FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);
    $address = filter_input(INPUT_POST, "address", 
                            FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

    //Insertion dans la base de données

    //Gestion de la profession

    // Rechercher l'id de la profession saisie
    $sql = "SELECT id FROM professions WHERE profession_name=?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$person["profession"]]);
    $result = $statement->fetch();

    //Si id est null alors on insère la nouvelle profession
    //puis on récupère l'id généré pour l'affecter à $person["profession"]
    if($result === false){
        $sql = "INSERT INTO professions (profession_name) VALUES (?)";
        $statement = $pdo->prepare($sql);
        $statement->execute([$person["profession"]]);

        $person["profession"] = $pdo->lastInsertId();

    } else {
        //Si id pas null alors on attribue la valeur de cet id à $person["profession"]
        $person["profession"] = $result["id"];
    }


    //insertion de la personne

    $sql = "INSERT INTO persons (first_name, person_name, profession_id)
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


//Récupération de la liste des professions
$sql = "SELECT id, profession_name FROM professions";
$request = $pdo->query($sql);
$professionList = $request->fetchAll();


//Affichage du formulaire
$pageTitle = "Nouvelle personne";
$content = "../views/personForm.php";

require "../views/baseLayout.php";