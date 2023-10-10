<?php

require_once "src/conn.php";
require_once "src/Modelo/Condominio.php";
require_once "src/Repositorio/CondominioRepositorio.php";

$condominioRepositorio = new CondominioRepositorio($pdo);
$dadosCondominio = $condominioRepositorio->recordCondominio();

// $condominio = $condominioRepositorio->buscarTodos();


// var_dump($dadosCondominio['0']);
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
    <h1>Admistração Macatto</h1>
  </section>
  <h2>Lista de Condominio</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Condomio</th>
          <th>CNPJ</th>
          <th>Setor</th>
          <th>Contato</th>
          <th>Valor Contrato</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($dadosCondominio as $produto): ?>
        <tr>
          <td> <?= $produto->getNome(); ?> </td>
          <td> <?= $produto->getCNPJ(); ?> </td>
          <td> <?= $produto->getContato(); ?> </td>
          <td> <?= $produto->getValorContrato(); ?> </td>
          <td><a class="botao-editar" href="editar.php?id=<?= $produto->getId() ?>">Editar</a></td>
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
  <a class="botao-cadastrar" href="cadastrar.php">Cadastrar produto</a>
  <form action="src/gerador-pdf.php" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  </section>

</main>
</body>
</html>