<?php 

require_once "src/conn.php";
require_once "src/Modelo/Produto.php";

$sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";
$sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";

$statement = $pdo->query($sql1);
$produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->query($sql2);
$produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

$dadosCafe = array_map(function($cafe){
    return new Produto($cafe['id'],
        $cafe['tipo'],
        $cafe['nome'],
        $cafe['descricao'],
        $cafe['imagem'],
        $cafe['preco']
    );
}, $produtosCafe);

$dadosProduto = array_map(function($cafe){
    return new Produto($cafe['id'],
        $cafe['tipo'],
        $cafe['nome'],
        $cafe['descricao'],
        $cafe['imagem'],
        $cafe['preco']
    );
}, $produtosAlmoco);

// var_dump($dadosCafe);
// exit();



?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="img/icone-serenatto.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Serenatto - Cardápio</title>
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto">
            </div>
        </section>
        <h2>Cardápio Digital</h2>

        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções para o Café</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach($dadosCafe as $cafe): ?>
                    <div class="container-produto">
                        <div class="container-foto"> <img src=" <?= "img/".$cafe->getImg() ?>"> </div>
                        <p>   <?= $cafe->getNome() ?>     </p>
                        <p>   <?= $cafe->getDescricao() ?></p>
                        <p>R$ <?= $cafe->getPreco() ?>    </p>
                    </div>
                <?php endforeach ?>
            </div>
        </section>

        <section class="container-almoco">
            
            <div class="container-almoco-titulo">
                <h3>Opções para o Almoço</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            
            <div class="container-almoco-produtos">
                <?php foreach($almoco as $item): ?>
                    <div class="container-produto">
                        <div class="container-foto"> <img src=" <?= "img/".$item->getImg() ?>"> </div>
                        <p> <?= $item->getNome() ?>      </p>
                        <p> <?= $item->getDescricao() ?> </p>
                        <p> R$ <?= $item->getPreco() ?> </p>
                    </div>
                <?php endforeach ?>
            </div>

        </section>
        
    </main>
</body>
</html>