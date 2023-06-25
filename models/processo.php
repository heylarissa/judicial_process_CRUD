<?php
require "pessoa.php";

class Processo {
    private $id;
    private Pessoa $advogado_id;
    private Pessoa $cliente_id;
    private $numero_processo;
    private $arquivo;

    public function getProcessoId(){
        return $this->id;
    }
    
    public function getAdvogadoId(){
        return $this->advogado_id;
    }

    public function setAdvogadoId($id){
        $this->advogado_id = $id;
    }
    public function getClienteId(){
        return $this->cliente_id;
    }

    public function setClienteId($id){
        $this->cliente_id = $id;
    }

    public function getNumeroProcesso(){
        return $this->numero_processo;
    }

    public function setNumeroProcesso($numero_processo){
        $this->numero_processo = $numero_processo;
    }
    
    public function getArquivo() {
        return $this->arquivo;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

}
?>