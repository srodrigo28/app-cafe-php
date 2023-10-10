<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "banco_php";
$port = 3306;

try{
    $pdo = new PDO("mysql:host=$host; port=$port; dbname=" . $dbname, $user, $pass);
}catch(error){
    var_dump(error);
}

?>