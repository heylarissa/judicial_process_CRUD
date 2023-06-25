<?php
class PessoaDao {
    private dbConnector $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertPessoa (Pessoa $pessoa){
        $query = "INSERT INTO pessoas (nome, cpf_cnpj, endereco, email) 
                VALUES ('{$pessoa->getNome()}', '{$pessoa->getCpfCnpj()}', '{$pessoa->getEndereco()}', '{$pessoa->getEmail()}');";  

        $this->db->execute($query);
    }

    public function selectPessoa ($id) {
        $query = "SELECT * FROM pessoas WHERE id = '{$id}';";
        return $this->db->execute($query);
    }

    public function getPessoas() {
        $query = "SELECT * FROM pessoas;";
        return $this->db->execute($query);
    }

    public function updatePessoa (Pessoa $pessoa){
        $query = "UPDATE pessoas
                    SET nome = '{$pessoa->getNome()}',
                        cpf_cnpj = '{$pessoa->getCpfCnpj()}',
                        endereco = '{$pessoa->getEndereco()}',
                        email = '{$pessoa->getEmail()}'
                    WHERE id = '{$pessoa->getId()}';";
        $this->db->execute($query);
    }

    public function deletePessoa (Pessoa $pessoa){
        $query = "DELETE FROM pessoas WHERE id= '{$pessoa->getId()}'";
        $this->db->execute($query);
    }
}
