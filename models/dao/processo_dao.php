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

        $this->db->execute($query);
    }

    public function selectProcesso($id)
    {
        $query = "SELECT * FROM processos
                    LEFT JOIN pessoas cliente on cliente.id = processos.cliente_id
                    LEFT JOIN pessoas advogado on advogado.id = processos.advogado_id 
                    WHERE id = '{$id}';";
        return $this->db->execute($query);
    }

    public function getProcessos()
    {
        $query = "SELECT * FROM processos
                    LEFT JOIN pessoas cliente on cliente.id = processos.cliente_id
                    LEFT JOIN pessoas advogado on advogado.id = processos.advogado_id;";
        return $this->db->execute($query);
    }

    public function updateProcesso(Processo $processo)
    {
        $query = "UPDATE processos
                    SET advogado_id = '{$processo->getAdvogado()->getId()}',
                        cliente_id = '{$processo->getCliente()->getId()}',
                        numero_processo = '{$processo->getNumeroProcesso()}',
                        arquivo = '{$processo->getArquivo()}',
                    WHERE id = '{$processo->getProcessoId()}';";
        $this->db->execute($query);
    }

    public function deleteProcesso(Processo $processo)
    {
        $query = "DELETE FROM processos WHERE id= '{$processo->getProcessoId()}'";
        $this->db->execute($query);
    }
}
