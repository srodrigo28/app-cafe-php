<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=banco_php', 'root', '');
}catch(error){
    var_dump(error);
}

?>