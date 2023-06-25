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

    public function getUserId(){
        return $this->id;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPasswd(){
        return $this->passwd;
    }

    public function getPessoa() {
        return $this->pessoa;
    }
}

?>