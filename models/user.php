<?php

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

    public function setUserId($id){
        $this->id = $id;
    }

    public function getFirstName(){
        return $this->first_name;
    }
    public function setFirstName($first_name){
        $this->first_name = $first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }
    public function setLastName($last_name){
        $this->last_name = $last_name;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }    

    public function getCelular() {
        return $this->celular;
    }
    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }

    public function getPasswd(){
        return $this->passwd;
    }
    public function setPasswd($passwd){
        $this->passwd = $passwd;
    }

    public function getPessoa() {
        return $this->pessoa;
    }
    public function setPessoa(Pessoa $pessoa){
        $this->pessoa = $pessoa;
    }

}

?>