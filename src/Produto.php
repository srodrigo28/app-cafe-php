<?php

class produto
{
    private int $id;

    private string $tipo;

    private string $nome;

    private string $descricao;
    
    private string $img;

    private float $preco;

    /*** @Param */
    public function __construct( int $id, string $tipo, string $nome, string $descricao, string $img,  float $preco ){
        $this->id = $id;
        $this->tipo = $tipo;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->img = $img;
        $this->preco = $preco;
    }

    public function getId(): int 
    { 
        return $this->id 
    }
    public function getTipo(): string { return $this->tipo }
    public function getNome(): string { return $this->nome }
    public function getDescription(): string { return $this->descrition }
    public function getImg(): string { return $this->img }
    public function getPreco(): float { return $this->preco }
}