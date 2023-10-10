<?php
  require_once "src/conn.php";
  require_once "src/Modelo/Condominio.php";
  require_once "src/Repositorio/CondominioRepositorio.php";

  $condominioRepositorio = new CondominioRepositorio($pdo);

  if (isset($_POST['editar'])) {
      $produto = new Condominio( $_POST['nome'], $_POST['cnpj'], $_POST['escricao_estadual'], $_POST['cidade'], $_POST['setor'], $_POST['endereco'],  $_POST['contato'], $_POST['email'], $_POST['valor_contrato'] );

    if (isset($_FILES['imagem'])) {     
      $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
      move_uploaded_file( $_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio() );
    }

  $condominioRepositorio->atualizar($produto);
  header("Location: admin.php");
  
} else {
    $produto = $condominioRepositorio->buscar($_GET['id']);
}

// var_dump($produto['0']);
// exit();

// var_dump($produto->getNome());
// exit();

?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Editar Condominio</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    
    <h1>Editar Condominio</h1>
    
  </section>
  <section class="container-form">
  
    <form method="post" enctype="multipart/form-data">

      <input type="text" id="nome" name="nome" value="" required>

      <input type="text" id="cnpj" name="cnpj" placeholder="Digite o cnpj" required>

      <input type="text" id="escricao_estadual" name="escricao_estadual" placeholder="Escrição Estadual"  required>

      <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>

      <input type="text" id="setor" name="setor" placeholder="Setor" required>

      <input type="text" id="endereco" name="endereco" placeholder="Endereço" required>

      <input type="text" id="contato" name="contato" placeholder="Contato" required>

      <input type="text" id="email" name="email" placeholder="E-mail" required>

      <input type="text" id="valor_contrato" name="valor_contrato" placeholder="Valor do Contrato" required>
      
      <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

      <label for="imagem">Envie uma imagem do produto</label>
      <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem" value="<?= $produto->getImagem() ?>">
      
      <input type="hidden" name="id" value="<?= $produto->getId()?>">
      <input type="submit" name="editar" class="botao-cadastrar"  value="Editar produto"/>
      
    </form>

  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
<script src="js/index.js"></script>
</body>
</html>