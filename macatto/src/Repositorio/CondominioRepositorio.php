<?php

class CondominioRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM condominio ORDER BY preco";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->formarObjeto($produto);
        }, $dados);

        return $todosOsDados;
    }
}