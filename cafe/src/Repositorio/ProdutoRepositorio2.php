<?php

class ProdutoRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function opcoesCafe(): array
    {
        $sql1 = " SELECT * FROM produtos WHERE tipo = 'Café' ORDER BY preco ";
        $statement = $this->pdo->query($sql1);
        $produtosCafe = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCafe = array_map(function($cafe){
            return new Produto($cafe['id'],
                $cafe['tipo'],
                $cafe['nome'],
                $cafe['descricao'],
                $cafe['imagem'],
                $cafe['preco']
            );
        }, $produtosCafe);

        return $dadosCafe;
    }
    /*** */
    public function opcoesAlmoco(): array
    {
        $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
        $statement = $this->pdo->query($sql2);
        $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosAlmoco = array_map(function($almoco){
            return new Produto($almoco['id'],
                $almoco['tipo'],
                $almoco['nome'],
                $almoco['descricao'],
                $almoco['imagem'],
                $almoco['preco']
            );
        }, $produtosAlmoco);


        return $dadosAlmoco;
    }
    

    // public function opcoesAlmoco(): array
    // {
    //     $sql2 = "SELECT * FROM produtos WHERE tipo = 'Almoço' ORDER BY preco";
    //     $statement = $this->pdo->query($sql2);
    //     $produtosAlmoco = $statement->fetchAll(PDO::FETCH_ASSOC);

    //     $dadosAlmoco = array_map(function ($almoco){
    //         return $this->formarObjeto($almoco);
    //     }, $produtosAlmoco);

    //     return $dadosAlmoco;
    // }
    // public function buscarTodos()
    // {
    //     $sql = "SELECT * FROM prudutos";
    //     $statement = $this->pdo-query($sql);
    //     $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        
    // }

}