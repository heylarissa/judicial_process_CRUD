<?php

class Pessoa {
    private $id;
    private $nome;
    private $cpf_cnpj;
    private $endereco;
    private $email;

    public function getPessoaId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCpfCnpj(){
        return $this->cpf_cnpj;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function getEmail() {
        return $this->email;
    }
}
?>