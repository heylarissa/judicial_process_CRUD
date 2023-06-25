<?php

class User {
    private $id;
    private $email;
    private $celular;
    private $username;
    private $passwd;
    private Pessoa $pessoa;

    public function __construct()
    {
        $this->pessoa = new Pessoa();
    }

    public function getUserId(){
        return $this->id;
    }

    public function setUserId($id){
        $this->id = $id;
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

    public function getPessoa():Pessoa {
        return $this->pessoa;
    }
    public function setPessoa($pessoa_id){
        $this->pessoa->setId($pessoa_id);
    }

}

?>