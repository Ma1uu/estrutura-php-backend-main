<?php

include_once 'Conn.php';

class Cliente {
    private $id;
    private $nome;
    private $informacoes;
    private $conn;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function getInformacoes() {
        return $this->informacoes;
    }

    public function setInformacoes($informacoes) {
        $this->informacoes = $informacoes;
        return $this;
    }

    public function salvar() {
        try {
            $this->conn = new Conn();
            $sql = "CALL salvar_cliente(?, ?, ?)";
            $executar = $this->conn->prepare($sql);
            $executar->bindValue(1, $this->id);
            $executar->bindValue(2, mb_strtoupper($this->nome));
            $executar->bindValue(3, mb_strtoupper($this->informacoes));
            return $executar->execute() ? true : false;

        } catch (PDOException $erro) {
            echo $erro->getMessage();
        }
    }
}