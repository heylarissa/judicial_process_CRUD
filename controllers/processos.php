<?php
require "../connectors/db_connector.php";

class Processo {
    var $connector;
    var $connection;

    public function __construct()
    {
        $this->connector = new dbConnector();
        $this->connection = $this->connector->connect();

    }

    public function getProcessos(){
        $query = "SELECT * FROM processos";
        $result = $this->connection->query($query);

        return $result;
    }

    public function deleteProcesso($id){
        $query = "DELETE FROM minhaTabela WHERE id='$id'";
        $result = $this->connection->query($query);

        return $result;
    }

    public function createProcesso(){
        $query = "";
        $result = $this->connection->query($query);

        return $result;
    }

    public function updateProcesso($id){
        $query = "";
        $result = $this->connection->query($query);

        return $result;
    }
}