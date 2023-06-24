<?php
require "config.ini.php";

class dbConnector{
    var $servername;
    var $username;
    var $password;
    var $database;

    public $connection;

    public function __construct(){
        $this->servername = DB_SERVER; 
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->database = DB_DATABASE;
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