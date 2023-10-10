<?php

require_once "conn.php";
require_once "Modelo/Produto.php";
require_once "Repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);
$produtos = $produtosRepositorio->buscarTodos();

$sql_soma = " SELECT SUM(preco) AS total FROM produtos ";
$result_valor = $pdo->prepare($sql_soma);
$result_valor->execute();

$row_valor = $result_valor->fetch(PDO::FETCH_ASSOC);
// echo($row_valor['total']);
// exit();
?>

<style>
    table{
        width: 90%;
        margin: auto 0;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 18px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
        font-size: 18px;
        padding: 8px;
    }
    .container-admin-banner h1{
        margin-top: 40px;
        font-size: 30px;
    }
</style>
<h1>Relatório de Produtos</h1>
<table>
<thead>
  <tr>
    <th>Produto</th>
    <th>Tipo</th>
    <th>Descricão</th>
    <th>Valor</th>
  </tr>
</thead>
<tbody>
<?php foreach ($produtos as $produto): ?>
  <tr>
    <td> <?= $produto->getNome(); ?> </td>
    <td> <?= $produto->getTipo(); ?> </td>
    <td> <?= $produto->getDescricao(); ?> </td>
    <td> <?= $produto->getPrecoFormatado(); ?> </td>
  </tr>
  <?php endforeach ?>
  <tr>
    <td  colspan="3"> Total:  </td>
    <td  colspan="1"> <strong> R$ <?= $row_valor['total']; ?> </strong> </td>
  </tr>
</tbody>
</table>