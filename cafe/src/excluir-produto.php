<?php

require_once "conn.php";
require_once "Modelo/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

$produtoRepositorio = new ProdutoRepositorio($pdo);
$produtoRepositorio->deletar($_POST['id']);

header("Location: http://localhost/www/app-cafe-php/admin.php" );

// var_dump($_GET['id']);

