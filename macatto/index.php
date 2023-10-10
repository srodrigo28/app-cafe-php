<?php 


require_once "src/conn.php";
require_once "src/Modelo/Condominio.php";
require_once "src/Repositorio/CondominioRepositorio.php";

$condominioRepositorio = new CondominioRepositorio($pdo);
$condominio = $condominioRepositorio->buscarTodos();

var_dump($condominio);
exit();

require_once "template/header.php";
?>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <!-- <img src="img/logo-serenatto.png" class="logo" alt="logo-serenatto"> -->
            </div>
        </section>
        <h2>Bem vindo sistema Gestão Condominio</h2>

        <section class="container-cafe-manha">
            <div class="container-cafe-manha-titulo">
                <h3>Sistema de Gestão</h3>
            </div>
            <div class="container-cafe-manha-produtos">
                <?php // foreach($dadosCafe as $cafe): ?>
                    <div class="container-produto">
                        <div class="container-foto"> <img src="img/1.jfif"> </div>
                        <p>  Nome condomio  </p>
                        <p>  Descrição     </p>
                        <p>  Cidade     </p>
                    </div>
                    <div class="container-produto">
                        <div class="container-foto"> <img src="img/1.jfif"> </div>
                        <p>  Nome condomio  </p>
                        <p>  Descrição     </p>
                        <p>  Cidade     </p>
                    </div>
                    <div class="container-produto">
                        <div class="container-foto"> <img src="img/1.jfif"> </div>
                        <p>  Nome condomio  </p>
                        <p>  Descrição     </p>
                        <p>  Cidade     </p>
                    </div>
                    <div class="container-produto">
                        <div class="container-foto"> <img src="img/1.jfif"> </div>
                        <p>  Nome condomio  </p>
                        <p>  Descrição     </p>
                        <p>  Cidade     </p>
                    </div>
                    <div class="container-produto">
                        <div class="container-foto"> <img src="img/1.jfif"> </div>
                        <p>  Nome condomio  </p>
                        <p>  Descrição     </p>
                        <p>  Cidade     </p>
                    </div>
                <?php // endforeach ?>

            </div>
        </section>

        
    </main>
</body>
</html>