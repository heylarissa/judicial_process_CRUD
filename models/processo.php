<?php

class Processo {
    private $id;
    private Pessoa $advogado;
    private Pessoa $cliente;
    private $numero_processo;
    private $arquivo;

    public function __construct()
    {
        $this->advogado = new Pessoa();
        $this->cliente = new Pessoa();
    }

    public function getProcessoId()
    {
        return $this->id;
    }
    
    public function getAdvogado():Pessoa
    {
        return $this->advogado;
    }

    public function setAdvogado($id)
    { 
        $this->advogado->setId($id);
    }

    public function getCliente():Pessoa
    {
        return $this->cliente;
    }

    public function setCliente($id)
    {
        $this->cliente->setId($id);
    }

    public function getNumeroProcesso()
    {
        return $this->numero_processo;
    }

    public function setNumeroProcesso($numero_processo)
    {
        $this->numero_processo = $numero_processo;
    }
    
    public function getArquivo() 
    {
        return $this->arquivo;
    }

    public function setArquivo($arquivo) 
    {
        $this->arquivo = $arquivo;
    }

}
?>