<?php

include_once 'Conn.php';

//Extenção PHP Getters & Setters

class Categoria {
    private $id;
    private $nome;
    private $informacoes;
    private $conn;

    public function getId() {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNome($nome) {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $nome;
    }

    public function getInformacoes($informacoes) {
        return $this->informacoes;
    }

    public function setinformacoes($informacoes)
    {
        $this->informacoes = $informacoes;
        return $informacoes;
    }

    public function salvar(){
        try{
            $this->conn = new Conn();
            $sql= "Call salvar_categoria(?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper( $this->nome));
            $executar->bindValue(3, mb_strtoupper( $this->informacoes));
            return $executar->execute() == 1 ? true : false;
        
        } catch (PDOException $erro){
            echo $erro->getMessage();
        }
    }
}