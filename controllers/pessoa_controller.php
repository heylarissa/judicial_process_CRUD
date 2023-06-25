<?php
require "../models/dao/pessoa_dao.php";
include "../models/pessoa.php";
require "../modules/connectors/db_connector.php";

class PessoaController {
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }

    public function showPessoas() {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            while ($pessoa = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $pessoa["id"] . "</td>
                        <td>" . $pessoa["nome"] . "</td>
                        <td>" . $pessoa["cpf_cnpj"] . "</td>
                        <td>" . $pessoa["endereço"] . "</td>
                        <td>" . $pessoa["email"] . "</td>
                    </tr>";
            }
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }
}

?>
