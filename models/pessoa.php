<?php

class Pessoa
{
    private $id;
    private $nome;
    private $cpf_cnpj;
    private $endereco;
    private $email;
    private $is_cliente;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIsCliente()
    {
        return $this->is_cliente;
    }

    public function setCliente($is_cliente)
    {
        $this->is_cliente = $is_cliente;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCpfCnpj()
    {
        return $this->cpf_cnpj;
    }
    public function setCpfCnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}
