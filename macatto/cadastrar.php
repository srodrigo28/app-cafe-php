<?php
require_once "src/conn.php";
require_once "src/Modelo/Condominio.php";
require_once "src/Repositorio/CondominioRepositorio.php";

    if (isset($_POST['cadastro'])){
        $produto = new Condominio(null,
            $_POST['nome'], 
            $_POST['cnpj'], 
            $_POST['escricao_estadual'], 
            $_POST['cidade'],
            $_POST['setor'],

            $_POST['endereco'], 
            $_POST['contato'], 
            $_POST['email'],
            $_POST['valor_contrato']
        );

        if (isset($_FILES['imagem'])) {     
            $produto->setImagem(uniqid() . $_FILES['imagem']['name']);
            move_uploaded_file( $_FILES['imagem']['tmp_name'], $produto->getImagemDiretorio() );
        }

    
    $produtoRepositorio = new CondominioRepositorio($pdo);
    $produtoRepositorio->salvar($produto);

    header("Location: admin.php");
    }

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
    <title>Cadastrar Novo</title>
</head>
<body>
    <style>
        h1{
            font-size: 50px;
            text-align: center;
            margin-top: 40px;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
<main>
    <section class="container-form">
        <form method="post" enctype="multipart/form-data" >
            <h1>Cadastro Novo</h1>
            
            <input type="text" id="nome" name="nome" placeholder="Digite o nome" required>

            <input type="text" id="cnpj" name="cnpj" placeholder="Digite o cnpj" required>

            <input type="text" id="escricao_estadual" name="escricao_estadual" placeholder="Escrição Estadual" required>

            <input type="text" id="cidade" name="cidade" placeholder="Cidade" required>

            <input type="text" id="setor" name="setor" placeholder="Setor" required>

            <input type="text" id="endereco" name="endereco" placeholder="Endereço" required>

            <input type="text" id="contato" name="contato" placeholder="Contato" required>

            <input type="text" id="email" name="email" placeholder="E-mail" required>

            <input type="text" id="valor_contrato" name="valor_contrato" placeholder="Valor do Contrato" required>
            
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

            <input type="submit" name="cadastro" class="botao-cadastrar" value="Cadastrar produto"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/index.js"></script>
</body>
</html>