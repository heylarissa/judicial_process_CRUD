<?php
require "pessoa.php";

abstract class User {
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $celular;
    private $username;
    private $passwd;
    private Pessoa $pessoa;
}

?>