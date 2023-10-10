<?php

class CondominioRepositorio
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    // formatarObjeto
    public function recordCondominio()
    {
        $sql1 = " SELECT * FROM condominio ORDER BY valor_contrato ";
        $statement = $this->pdo->query($sql1);
        $produtoCondominio = $statement->fetchAll(PDO::FETCH_ASSOC);

        $dadosCondominio = array_map(function($item){
            return new Condominio($item['id'],
                $item['nome'],
                $item['cnpj'],
                $item['escricao_estadual'],
                $item['cidade'],
                $item['setor'],

                $item['endereco'],
                $item['contato'],
                $item['email'],
                $item['valor_contrato'],
                $item['imagem']
            );
        }, $produtoCondominio);

        return $dadosCondominio;
    }

    public function buscar(int $id): array
    {
        $sql = " SELECT * FROM condominio WHERE id = ? ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();

        $dados = $statement->fetch(PDO::FETCH_ASSOC);

        return $this->recordCondominio($dados);
    }

    public function buscarTodos()
    {
        $sql = " SELECT * FROM condominio ORDER BY nome ";
        $statement = $this->pdo->query($sql);
        $dados = $statement->fetchAll(PDO::FETCH_ASSOC);

        $todosOsDados = array_map(function ($produto){
            return $this->recordCondominio($produto); //formarObjeto
        }, $dados);

        return $todosOsDados;
    }

    public function deletar(string $id)
    {
        $sql = " DELETE FROM condominio WHERE id = ? ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function salvar(Condominio $item)
    {
        $sql = "INSERT INTO condominio (nome, cnpj, escricao_estadual, cidade, setor, endereco, contato, email, valor_contrato, imagem) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $item->getNome());
        $statement->bindValue(2, $item->getCnpj());
        $statement->bindValue(3, $item->getEscricaoEstadual());
        $statement->bindValue(4, $item->getCidade());
        $statement->bindValue(5, $item->getSetor());
        $statement->bindValue(6, $item->getEndereco());
        $statement->bindValue(7, $item->getContato());
        $statement->bindValue(8, $item->getEmail());
        $statement->bindValue(9, $item->getValorContrato());
        $statement->bindValue(10, $item->getImagem());
        $statement->execute();
    }

    public function atualizar(Condominio $item)
    {
        $sql = " UPDATE condominio SET nome=?, cnpj=?, escricao_estadual=?, cidade=?, setor=?, endereco=?, contato=?, email=?, valor_contrato=?, imagem=? WHERE id=? ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $item->getNome());
        $statement->bindValue(2, $item->getCnpj());
        $statement->bindValue(3, $item->getEscricaoEstadual());
        $statement->bindValue(4, $item->getCidade());
        $statement->bindValue(5, $item->getSetor());
        $statement->bindValue(6, $item->getEndereco());
        $statement->bindValue(7, $item->getContato());
        $statement->bindValue(8, $item->getEmail());
        $statement->bindValue(9, $item->getValorContrato());
        $statement->bindValue(9, $item->getImagem());
        $statement->bindValue(10, $item->getId());
        $statement->execute();
    }
}