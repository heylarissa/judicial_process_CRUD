<?php
require_once "../modules/connectors/db_connector.php";
require_once "../models/dao/processo_dao.php";
require_once "../models/pessoa.php";
require_once "../models/processo.php";

class ProcessoController
{
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }

    public function editProcesso(Processo $processo){
        $processo->setAdvogado($_POST['advogado']);
        $processo->setCliente($_POST['cliente']);
        $arquivo = 0;
        if (!empty($_POST['arquivo'])) {
            $arquivo = 1;
        }
        $processo->setArquivo($arquivo);

        $processo_dao = new ProcessoDao($this->db);
        $result = $processo_dao->updateProcesso($processo);

        if ($result){
            echo "<br><span class='success-message'>Processo atualizado com sucesso</span>";
        }

    }

    public function detailProcesso($id)
    {
        $processo_dao = new ProcessoDao($this->db);
        $processo = new Processo();

        $result = $processo_dao->selectProcesso($id);

        if ($result->num_rows == 1) {
            $processo_array = $result->fetch_assoc();
            
            $processo->setProcessoId($id);
            $processo->setAdvogado($processo_array['advogado_id']);
            $processo->setCliente($processo_array['cliente_id']);
            $processo->setNumeroProcesso($processo_array['numero_processo']);
            $processo->setArquivo($processo_array['arquivo']);

            return $processo;
        } else {
            echo "Processo não encontrado";
        }
    }

    public function createProcesso()
    {
        /* Controller que cadastra o processo */

        $advogado = $_POST['advogado'];
        $cliente = $_POST['cliente'];
        $numero_processo = $_POST['numero_processo'];

        $arquivo = 0;
        if (!empty($_POST['arquivo'])) {
            $arquivo = 1;
        }

        $processo = new Processo();
        $processo->setAdvogado($advogado);
        $processo->setCliente($cliente);
        $processo->setNumeroProcesso($numero_processo);
        $processo->setArquivo($arquivo);

        $processoDAO = new ProcessoDao($this->db);
        $processoDAO->insertProcesso($processo);
        $this->db->connect()->close();
    }

    public function showProcessos()
    {
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
                        
                        <td>
                            <a href='processo_detail.php?id=" . $processo["id"] . "'>Editar</a>
                            <a href='processo_delete.php?id=" . $processo["id"] . "'>Excluir</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "Não foram retornados registros."; // Não há linhas (registros) retornados
        }
    }
}
