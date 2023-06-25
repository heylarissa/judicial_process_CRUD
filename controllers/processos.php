<?php
require "../modules/connectors/db_connector.php";
require "../models/processo.php";

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

        return $result;
    }

}
