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
  .texto-total{
    font-weight: bold;
    text-align: right;
  }
  .valor_texto{
    width: 65px;
  }
  .valor_title{
    text-align: center;
  }
    h1{
        width: 90%;
        margin: auto 40px;
        margin-bottom: 10px;
    }
    table{
        width: 90%;
        margin: auto 40px;
    }
    table, th, td{
        border: 1px solid #000;
    }

    table th{
        padding: 11px 0 11px;
        font-weight: bold;
        font-size: 14px;
        text-align: left;
        padding: 8px;
    }

    table tr{
        border: 1px solid #000;
    }

    table td{
      font-size: 14px;
        padding: 8px;
    }
</style>
<h1>Relatório de Produtos</h1>
<table>
<thead>
  <tr>
    <th>Produto</th>
    <th>Tipo</th>
    <th>Descricão</th>
    <th class="valor_title">Valor</th>
  </tr>
</thead>
<tbody>
<?php foreach ($produtos as $produto): ?>
  <tr>
    <td> <?= $produto->getNome(); ?> </td>
    <td> <?= $produto->getTipo(); ?> </td>
    <td> <?= $produto->getDescricao(); ?> </td>
    <td class="valor_texto"> <?= $produto->getPrecoFormatado(); ?> </td>
  </tr>
  <?php endforeach ?>
  <tr>
    <td  colspan="2"> <strong>Total: </strong> </td>
    <td  colspan="2" class="texto-total" > R$ <?= $row_valor['total']; ?> </td>
  </tr>
</tbody>
</table>