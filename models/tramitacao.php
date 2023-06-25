<?php
require "pessoa.php";
require "processo.php";

class Tramitacao {
    private $id;
    private Pessoa $adv_responsavel;
    private Processo $processo;
    private $descricao;
    private $data_tramitacao;
}
?>