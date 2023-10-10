<?php 

require_once "src/conn.php";
require_once "src/Modelo/Condominio.php";
require_once "src/Repositorio/CondominioRepositorio.php";

$condominioRepositorio = new CondominioRepositorio($pdo);

$dadosCondominio = $condominioRepositorio->recordCondominio();
$condominio = $condominioRepositorio->buscarTodos();

require_once "template/header.php";
?>
    <main>
        <h2>Bem vindo sistema Gestão Condominio</h2>

        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Opções Condominio</h3>
            </div>
            <div class="container-cafe-manha-produtos">
                <?php foreach($dadosCondominio as $item): ?>
                    <div class="container-produto">
                    <div class="container-foto"> <img src=" <?= $item->getImagemDiretorio() ?>"> </div>
                        <p>   <?= $item->getNome() ?>   </p>
                        <p>   <?= $item->getCNPJ() ?>     </p>
                        <p>   <?= $item->getContato() ?>    </p>
                        <p>   <?= $item->getCidade() ?>    </p>
                    </div>
                <?php endforeach ?>

            </div>
        </section>

        
    </main>
</body>
</html>