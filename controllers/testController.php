<?php

$table = filter_input(INPUT_GET, "table");

$allowedTableNames = ["persons", "addresses"];

//Test des valeurs admises
if(! in_array($table, $allowedTableNames)){
    $table = "";
}

echo "SELECT * FROM $table";