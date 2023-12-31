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

    public function createPessoa($is_cliente)
    {
        $email = $_POST['email'];
        $cpf_cnpj = $_POST['cpf'];
        $nome = $_POST['nome'];

        $pessoa = new Pessoa();
        $pessoa->setEmail($email);
        $pessoa->setCpfCnpj($cpf_cnpj);
        $pessoa->setNome($nome);
        $pessoa->setCliente($is_cliente);


        $pessoaDAO = new PessoaDAO($this->db);
        $new_pessoa_id = $pessoaDAO->insertPessoa($pessoa);
        $this->db->connect()->close();

        return $new_pessoa_id;
    }
    public function listClientesProcessoCreate()
    {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();
        $selected = "Selecione";
        if (isset($_POST['cliente'])) {
            $selected = $_POST['cliente'];
        }

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            echo " <div class='form-group'>
                        <label>Cliente</label>
                        <select name='cliente' class='form-control' required>";

            while ($pessoa = $result->fetch_assoc()) {
                
                if ($pessoa['cliente'] == true) {
                    if ($selected == $pessoa["nome"]) {
                        echo "<option selected value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
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
    public function listAdvogadosProcessoCreate()
    {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();
        $selected = "Selecione";
        if (isset($_POST['advogado'])) {
            $selected = $_POST['advogado'];
        }

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            echo " <div class='form-group'>
                        <label>Advogado</label>
                        <select name='advogado' class='form-control' required>";

            while ($pessoa = $result->fetch_assoc()) {

                if ($pessoa['cliente'] == false) {
                    if ($selected == $pessoa["nome"]) {
                        echo "<option selected value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
                    } else {
                        echo "<option value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
                    }
                }
            }

            echo "  </select>
                </div>";
        } else {
            echo "Não foram retornados registros.";
        }
    }
    public function listClientes($selected)
    {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            echo " <div class='form-group'>
                        <label>Clientes</label>
                        <select name='cliente' class='form-control' required>";

            while ($pessoa = $result->fetch_assoc()) {
                if ($pessoa['cliente'] == true) {
                    if ($selected == "Selecione") {
                        echo "<option selected value='0'>Selecione</option>";
                    } elseif ($selected == $pessoa["id"]) {
                        echo "<option selected value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
                    } else {
                        echo "<option value='" . $pessoa['id'] . "'>" . $pessoa["nome"] . "</option>";
                    }
                }
            }

            echo "  </select>
                </div>";
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }
    public function listAdvogados($selected)
    {
        $pessoas = new PessoaDao($this->db);
        $result = $pessoas->getPessoas();
        $this->db->connect()->close();

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            echo " <div class='form-group'>
                        <label>Advogado</label>
                        <select name='advogado' class='form-control' required>";

            while ($pessoa = $result->fetch_assoc()) {
                if ($pessoa['cliente'] == false) {
                    if ($selected == "Selecione") {
                        echo "<option selected value='0'>Selecione</option>";
                    } elseif ($selected == $pessoa["nome"]) {
                        echo "<option selected value='$pessoa[id]'>" . $pessoa["nome"] . "</option>";
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
                        <td>" . $pessoa["endereco"] . "</td>
                        <td>" . $pessoa["email"] . "</td>

                    </tr>";
            }
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }
}
