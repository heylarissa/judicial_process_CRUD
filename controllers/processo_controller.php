<?php
require "../modules/connectors/db_connector.php";
require "../models/dao/processo_dao.php";
include "../models/pessoa.php";
include "../models/processo.php";

class ProcessoController {
    var $db;
    var $connection;

    public function __construct()
    {
        $this->db = new dbConnector();
    }

    public function getProcessos(){

        $query = "SELECT * FROM processos";
        $result = $this->db->execute($query);

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"] . "</td>
                        <td>" . $row["advogado_id"] . "</td>
                        <td>" . $row["cliente_id"] . "</td>
                        <td>" . $row["numero_processo"] . "</td>
                        <td>" . $row["arquivo"] . "</td>
                    </tr>";
            }
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }

    }

}
