<?php

class condominio {
    private ?int $id;

    private string $nome;
    private string $cnpj;
    private string $escricaoEstadual;
    private string $cidade;
    private string $setor;

    private string $endereco;
    private string $contato;
    private string $email;
    private float $valorContrato;
    private string $imagem;

    /*** @Param */
    public function __construct( 
        ?int $id, string $nome, string $cnpj, string $escricaoEstadual,
        string $cidade, string $setor, string $endereco, string $contato, 
        string $email, float $valorContrato, string $imagem = "padrao-condominio.jpeg" )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->escricaoEstadual = $escricaoEstadual;
        $this->cidade = $cidade;
        $this->setor = $setor;
        
        $this->endereco = $endereco;
        $this->contato = $contato;
        $this->email = $email;
        $this->valorContrato = $valorContrato;
        $this->imagem = $imagem;
    }

    public function getId(): ?int { return $this-> id; }
    public function getNome(): string { return $this->nome; }
    public function getCnpj(): string { return $this->cnpj; }
    public function getEscricaoEstadual(): string { return $this->escricaoEstadual; }
    public function getCidade(): string { return $this->cidade; }

    public function getSetor(): string { return $this->setor; }
    public function getEndereco(): string { return $this->endereco; }
    public function getContato(): string { return $this->contato; }
    public function getEmail(): string { return $this->email; }
    
    public function getValorContrato(): float { return $this->valorContrato; }
    public function getPrecoFormatado(): string { return "R$ " . number_format($this->preco, 2); }

    public function getImagem(): string { return $this->imagem; }
    public function getImagemDiretorio(): string { return "img/".$this->imagem; }
    
    public function setImagem(string $imagem): void { $this->imagem = $imagem; }

}
