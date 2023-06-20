<?php

class dbConnector{
    var $servername;
    var $username;
    var $password;
    var $database;

    public $connection;

    public function __construct($servername, $username, $password, $database){
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect (){
        
        $this->connection = new mysqli($this->servername,$this->username,$this->password,$this->database);

        if (mysqli_connect_error())
			{
				echo mysqli_connect_error();
				exit();
			}
			else
				return $this->connection;
        
    }

}
?>