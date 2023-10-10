<?php

require_once "conn.php";
require_once "Modelo/Condominio.php";
require_once "Repositorio/CondominioRepositorio.php";

$dadosCondominio = new CondominioRepositorio($pdo);
$dadosCondominio->deletar($_POST['id']);

header("Location: http://localhost/www/app-cafe-php/macatto/admin.php" );

