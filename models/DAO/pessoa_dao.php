<?php
require "../pessoa.php";
require "modules/connectors/db_connector.php";


class PessoaDao {
    private dbConnector $db;

    public function __construct($db)
    {
        $this->db = $db;
        
    }
    public function insertPessoa ($pessoa){
        $query = "INSERT INTO produtos (nome, cpf_cnpj, endereco, email) 
                VALUES ('{$pessoa->getNome()}', '{$pessoa->getCpfCnpj()}', '{$pessoa->getEndereco()}', '{$pessoa->getEmail()}')";  

        $result = $this->db->getConnection()->query($query);

    }
}

?>