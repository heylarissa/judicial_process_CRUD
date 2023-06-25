<?php
require_once "../modules/connectors/db_connector.php";
require_once "../models/dao/pessoa_dao.php";
require_once "../models/pessoa.php";

class PessoaController
{
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }
    public function listClientes()
    {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();
        $selected = $_POST['cliente'];

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            echo " <div class='form-group'>
                        <label>Clientes</label>
                        <select  name='cliente' class='form-control'>
                        <option selected='$selected' value=''>Selecione</option>";

            while ($pessoa = $result->fetch_assoc()) {
                if ($pessoa['cliente'] == true) {
                    if ($selected == $pessoa["id"]) {
                        echo "<option selected='$selected' value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
                    } else {
                        echo "<option value='".$pessoa['id']."'>" . $pessoa["nome"] . "</option>";
                    }
                }
            }

            echo "  </select>
                </div>";
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }
    public function listAdvogados()
    {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();

        $selected = $_POST['advogado'];
        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            echo " <div class='form-group'>
                        <label>Advogado</label>
                        <select name='advogado' class='form-control'>
                        <option selected='$selected' value=''>Selecione</option>";

            while ($pessoa = $result->fetch_assoc()) {
                if ($pessoa['cliente'] == false) {
                    if ($selected == $pessoa["nome"]) {
                        echo "<option selected='$selected' value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
                    } else {
                        echo "<option value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
                    }
                }
            }

            echo "  </select>
                </div>";
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }

    public function showPessoas()
    {
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
