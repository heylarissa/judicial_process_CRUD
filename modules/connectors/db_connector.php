<?php
require "config.ini.php";

class dbConnector{
    private $servername;
    private $username;
    private $password;
    private $database;

    private $connection;

    public function __construct(){
        $this->servername = DB_SERVER; 
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->database = DB_DATABASE;

        $this->connect();
    }

    public function getConnection () {
        return $this->connection;
    }

    public function execute ($query) {
        $results = $this->connection->query($query);

        if ($results == false){
            echo "Failure: ". $query;
        }
        return $results;
    }

    public function connect (){
        
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if (mysqli_connect_error())
			{
				echo mysqli_connect_error();
				exit();
			}
			else
				return $this->connection;
        
    }

}
