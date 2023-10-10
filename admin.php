<?php

require_once "src/conn.php";
require_once "src/Modelo/Produto.php";
require_once "src/Repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);
$produtos = $produtosRepositorio->buscarTodos();

// var_dump($produtos);
// exit();

require_once "template/header.php";

?>

<style>
  table tbody tr:hover{
    cursor: pointer;
    opacity: .2;

}
</style>
<main>
  <section class="container-admin-banner">
    <img src="img/logo-serenatto-horizontal.png" class="logo-admin" alt="logo-serenatto">
    <h1>Admistração Serenatto</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <h2>Lista de Produtos</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($produtos as $produto): ?>
        <tr>
          <td> <?= $produto->getNome(); ?> </td>
          <td> <?= $produto->getTipo(); ?> </td>
          <td> <?= $produto->getDescricao(); ?> </td>
          <td> <?= $produto->getPrecoFormatado(); ?> </td>
          <td><a class="botao-editar" href="editar-produto.php?id=<?= $produto->getId() ?>">Editar</a></td>
          <td>
            <form action="./src/excluir-produto.php" method="post">
              <input type="hidden" name="id" value=" <?= $produto->getId() ?> " >
              <input type="submit" class="botao-excluir" value="Excluir">
            </form>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-produto.php">Cadastrar produto</a>
  <form action="src/gerador-pdf.php" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>

</main>
</body>
</html>