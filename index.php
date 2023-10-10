<?php 

require_once "src/conn.php";
require_once "src/Modelo/Produto.php";
require "src/Repositorio/ProdutoRepositorio.php";

$produtosRepositorio = new ProdutoRepositorio($pdo);

$dadosCafe = $produtosRepositorio->opcoesCafe();
$dadosAlmoco = $produtosRepositorio->opcoesAlmoco();

require_once "template/header.php";
?>
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
                        <div class="container-foto"> <img src=" <?= $cafe->getImagemDiretorio() ?>"> </div>
                        <p>   <?= $cafe->getNome() ?>     </p>
                        <p>   <?= $cafe->getDescricao() ?> </p>
                        <p>   <?= $cafe->getPrecoFormatado() ?> </p>
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
                <?php foreach($dadosAlmoco as $item): ?>
                    <div class="container-produto">
                        <div class="container-foto"> <img src=" <?= $item->getImagemDiretorio() ?>"> </div>
                        <p> <?= $item->getNome() ?>      </p>
                        <p> <?= $item->getDescricao() ?> </p>
                        <p> <?= $item->getPrecoFormatado() ?> </p>
                    </div>
                <?php endforeach ?>
            </div>

        </section>
        
    </main>
</body>
</html>