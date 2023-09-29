<?php 

require "./conn.php";
// $sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ";
$sql1 = "SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco";

$statement = $pdo->query($sql1);
$produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);


$sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ";

$statement = $pdo->query($sql2);
$almoco = $statement->fetchAll(PDO::FETCH_ASSOC);

// var_dump($produtosCafe);
// exit();

// $produtosCafe = [
//     [
//         'nome' => "Café com Leite",
//         'descricao' => "A harmonia do café e do leite, uma experiência reconfortante",
//         'preco' => "2.00",
//         'imagem' => "img/cafe-com-leite.jpg",
//     ],
//     [
//         'nome' => "Cappuccino",
//         'descricao' => "Café suave, leite cremoso e uma pitada de sabor adocicado",
//         'preco' => "7.00",
//         'imagem' => "img/cappuccino.jpg"
//     ],
//     [
//         'nome' => "Café Gelado",
//         'descricao' => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
//         'preco' => "3.00",
//         'imagem' => "img/cafe-gelado.jpg"
//     ],
//     [
//         'nome' => "Café Gelado",
//         'descricao' => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
//         'preco' => "3.00",
//         'imagem' => "img/cafe-gelado.jpg"
//     ],
//     [
//         'nome' => "Café Gelado",
//         'descricao' => "Café gelado refrescante, adoçado e com notas sutis de baunilha ou caramelo.",
//         'preco' => "3.00",
//         'imagem' => "img/cafe-gelado.jpg"
//     ]
// ];

// $almoco = [
//     [
//         'nome' => "Bife 1",
//         'descricao' => "Bife, arroz com feijão e uma deliciosa batata frita",
//         'preco' => "17.00",
//         'imagem' => "img/bife.jpg",
//     ],
//     [
//         'nome' => "Filé de Peixe",
//         'descricao' => "Filé de peixe salmão assado, arroz, feijão verde e tomate.",
//         'preco' => "17.00",
//         'imagem' => "img/prato-peixe.jpg",
//     ],
//     [
//         'nome' => "Filé de Frango",
//         'descricao' => "Prato italiano autêntico da massa do fettuccine com peito de frango grelhado",
//         'preco' => "17.00",
//         'imagem' => "img/prato-frango.jpg",
//     ],
//     [
//         'nome' => "Bife 1",
//         'descricao' => "Bife, arroz com feijão e uma deliciosa batata frita",
//         'preco' => "17.00",
//         'imagem' => "img/bife.jpg",
//     ],
//     [
//         'nome' => "Filé de Peixe",
//         'descricao' => "Filé de peixe salmão assado, arroz, feijão verde e tomate.",
//         'preco' => "17.00",
//         'imagem' => "img/prato-peixe.jpg",
//     ],
//     [
//         'nome' => "Filé de Frango",
//         'descricao' => "Prato italiano autêntico da massa do fettuccine com peito de frango grelhado",
//         'preco' => "17.00",
//         'imagem' => "img/prato-frango.jpg",
//     ],
// ];

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
                <?php foreach($produtosCafe as $cafe): ?>
                    <div class="container-produto">
                        <div class="container-foto"> <img src=" <?= "img/".$cafe['imagem'] ?>"> </div>
                        <p>   <?= $cafe['nome'] ?>     </p>
                        <p>   <?= $cafe['descricao'] ?></p>
                        <p>R$ <?= $cafe['preco'] ?>    </p>
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
                        <div class="container-foto"> <img src=" <?= "img/".$item['imagem'] ?>"> </div>
                        <p> <?= $item['nome'] ?>      </p>
                        <p> <?= $item['descricao'] ?> </p>
                        <p> R$ <?= $item['preco'] ?> </p>
                    </div>
                <?php endforeach ?>
            </div>

        </section>
        
    </main>
</body>
</html>