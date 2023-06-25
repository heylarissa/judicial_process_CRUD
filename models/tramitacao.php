<?php

class Tramitacao {
    private $id;
    private Pessoa $adv_responsavel;
    private Processo $processo;
    private $descricao;
    private $data_tramitacao;

    public function __construct()
    {
        $this->adv_responsavel = new Pessoa();
        $this->processo = new Processo();
    }

    public function getId(){
        return $this->id;
    }

    public function getAdvogado(){
        return $this->adv_responsavel;
    }

    public function getProcesso(){
        return $this->processo;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getDataTramitacao(){
        return $this->data_tramitacao;
    }
}
?>