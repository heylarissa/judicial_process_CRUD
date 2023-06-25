<?php
require "../modules/connectors/db_connector.php";
require "../models/dao/processo_dao.php";
include "../models/pessoa.php";
include "../models/processo.php";

class ProcessoController {
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }

    public function showProcessos(){
        $processos = new ProcessoDao($this->db);
        $result = $processos->getProcessos();

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
