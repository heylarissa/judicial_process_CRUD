<?php
require_once "../modules/connectors/db_connector.php";
require_once "../models/dao/processo_dao.php";
require_once "../models/pessoa.php";
require_once "../models/processo.php";

class ProcessoController {
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }

    public function createProcesso() {
        /* Controller que cadastra o processo */

        $advogado = $_POST['advogado']."<br>";
        echo $advogado;
        $cliente = $_POST['cliente']."<br>";
        echo $cliente;
        $numero_processo = $_POST['numero_processo']."<br>";
        echo $numero_processo;
        $arquivo = $_POST['arquivo']."<br>";
        echo $arquivo;

        $processo = new Processo();
        $processo->setAdvogado($advogado);
        $processo->setCliente($cliente);
        $processo->setNumeroProcesso($numero_processo);
        $processo->setArquivo($arquivo);

        $processoDAO = new ProcessoDao($this->db);
        $processoDAO->insertProcesso($processo);
        
    }

    public function showProcessos(){
        /* Exibe todos os processos */

        $processos = new ProcessoDao($this->db);
        $result = $processos->getProcessos();
        $this->db->connect()->close();

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            while ($processo = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $processo["id"] . "</td>
                        <td>" . $processo["adv"] . "</td>
                        <td>" . $processo["cliente"] . "</td>
                        <td>" . $processo["numero_processo"] . "</td>
                        <td>" . $processo["arquivado"] . "</td>
                    </tr>";
            }
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }

}
