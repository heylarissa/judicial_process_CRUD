<?php

class ProcessoDao
{
    private dbConnector $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertProcesso(Processo $processo)
    {
        $query = "INSERT INTO processos (advogado_id, cliente_id, numero_processo, arquivo) 
                VALUES ('{$processo->getAdvogado()->getId()}', 
                        '{$processo->getCliente()->getId()}', 
                        '{$processo->getNumeroProcesso()}', 
                        '{$processo->getArquivo()}');";
        echo $query;
        $result = $this->db->execute($query);

            if ($result) {
                echo "Success";
            }
            else {
                echo "Failure in query: ".$query;
            }
    }

    public function selectProcesso($id)
    {
        $query = "SELECT processos.*, 
                        cliente.nome AS cliente_nome, 
                        advogado.nome AS advogado_nome 
                    FROM juris.processos processos 
                    LEFT JOIN pessoas cliente ON cliente.id = processos.cliente_id 
                    LEFT JOIN pessoas advogado ON advogado.id = processos.advogado_id 
                    WHERE processos.id='{$id}';";
        return $this->db->execute($query);
    }

    public function getProcessos()
    {
        $query = "SELECT cliente.nome cliente, advogado.nome adv, processos.* , 
                    CASE WHEN processos.arquivo = TRUE THEN 'Sim'
                        ELSE 'Não'
                    END as arquivado
                    FROM processos
                    LEFT JOIN pessoas cliente on cliente.id = processos.cliente_id
                    LEFT JOIN pessoas advogado on advogado.id = processos.advogado_id;";
        return $this->db->execute($query);
    }

    public function updateProcesso(Processo $processo)
    {
        $query = "UPDATE processos
                    SET advogado_id = {$processo->getAdvogado()->getId()},
                        cliente_id = {$processo->getCliente()->getId()},
                        numero_processo = '{$processo->getNumeroProcesso()}',
                        arquivo = {$processo->getArquivo()}
                    WHERE id = {$processo->getProcessoId()};";
        return $this->db->execute($query);
    }

    public function deleteProcesso(Processo $processo)
    {
        $query = "DELETE FROM processos WHERE id= '{$processo->getProcessoId()}'";
        $this->db->execute($query);
    }
}
