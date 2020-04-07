<?php

//Instanciation de PDO
$pdo = getPDO();

/****************************
 * INSERTION D'UNE PERSONNE
 ****************************/

 //Les données sont elles postées
 $isPosted = filter_has_var(INPUT_POST, "submit");

 //Récupération de l'id eventuel
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

//Les données ne sont pas postées et l'id n'est pas nul
//Il faut alors récupérer les infos de la personne depuis la BD

//Initialisation de la variable contenant les infos d'une personne
$person = [];

if($id >0 && ! $isPosted){
    try {
        $sql = "SELECT * FROM persons WHERE id=$id";
        $request = $pdo->query($sql);
        $person = $request->fetch();

    } catch (PDOException $e){
        $pageTitle = "Erreur";
        $errorMessage = "Une erreur empêche la lecture de infos d'une personne sur la base de données";
        $content = "../views/error.php";

        //Affichage de l'erreur
        require "../views/baseLayout.php";
        die;
    }
}

 //Traitement du formulaire si les données sont postées
 if($isPosted){
    //Récupération de la saisie
    $firstName = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, "personName", FILTER_SANITIZE_STRING);
    $profession = filter_input(INPUT_POST, "profession", FILTER_SANITIZE_STRING);
    
    try {
        //Création de la requête SQL
        if(empty($id)){
            $sql = "INSERT INTO persons (first_name, person_name, profession)
                    VALUES ('$firstName', '$name', '$profession')";
        } else {
            $sql = "UPDATE persons SET 
                            first_name='$firstName', 
                            person_name='$name', 
                            profession='$profession' 
                            WHERE id=$id";
        }
        

        //Exécution de la requête
        $pdo->exec($sql);

        //Redirection pour effacer les données postées
        header("location:/?page=pdo");

    } catch (PDOException $e){
        $pageTitle = "Erreur";
        $errorMessage = "Une erreur empêche la création d'une personne sur la base de données";
        $content = "../views/error.php";

        //Affichage de l'erreur
        require "../views/baseLayout.php";
        die;
    }

 }


/****************************
 * Affichage des personnes
 ****************************/
try {
    $personList = getDataFromQuery("SELECT * FROM persons", $pdo);

    //Définition des variables de la vue
    $pageTitle = "Test de PDO";
    $content = "../views/pdo.php";

} catch(PDOException $e){
    $pageTitle = "Erreur";
    $errorMessage = "Une erreur empêche la requête sur la base de données";
    $content = "../views/error.php";
}


//Affichage de la vue
require "../views/baseLayout.php";
