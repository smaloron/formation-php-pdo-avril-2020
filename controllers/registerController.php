<?php

$isPosted = filter_has_var(INPUT_POST, "submit");
$errors = [];

$pdo = getPDO();

if($isPosted){
    //Récupération de la saisie
    $userName = filter_input(INPUT_POST, "userName", FILTER_SANITIZE_STRING);
    $userEmail = filter_input(INPUT_POST, "userEmail", FILTER_SANITIZE_EMAIL);
    $plainPassword = filter_input(INPUT_POST, "userPassword", FILTER_DEFAULT);

    //Validation de la saisie
    if(empty($userName)){
        array_push($errors, "Le nom de l'utilisater ne peut être vide");
    } else if (mb_strlen($userName) < 3){
        array_push($errors, "Le nom de l'utilisateur doit comporter plus de 2 caractères");
    }

    if(empty($userEmail)){
        array_push($errors, "L'adresse email ne peut être vide");
    }

    if(empty($plainPassword)){
        array_push($errors, "Le mot de passe ne peut être vide");
    }

    //Insertion de l'utilisateur s'il n'y a pas d'erreur
    if(count($errors) == 0){
        $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?,?,?)";
        $params = [
            $userName, 
            $userEmail, 
            password_hash($plainPassword, PASSWORD_DEFAULT )
        ];

        $statement = $pdo->prepare($sql);
        $statement->execute($params);

        

    }


}

$pageTitle = "Inscription";
$content = "../views/register.php";

require "../views/baseLayout.php";
