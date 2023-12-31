<?php
require "components/auth.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juris - Processos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <?php
    require 'components/juris-nav.php';
    ?>
    <div id="main" class="container">
        <?php
        include "components/go_back.php";
        ?>
        <h1>Novo processo</h1>
        <br>

        <form method="POST" action="#">
            <div class="form-group">
                <label for="numero_processo">Número do Processo</label>
                <input required type="text" class="form-control" id="numero_processo_id" name="numero_processo" placeholder="">
            </div>
            <?php
            require_once "../controllers/pessoa_controller.php";
            $advogados = new PessoaController();
            $advogados->listAdvogadosProcessoCreate("Selecione");

            $clientes = new PessoaController();
            $clientes->listClientesProcessoCreate("Selecione");

            ?>
            <div class="form-check">
                <label class="form-check-label" for="flexCheckChecked">
                    Arquivado
                </label>
                <input name="arquivo" type="checkbox" class="form-control-input" id="arquivo" placeholder="">

            </div>
            <input type="submit"  style="color:white; background:none;border: 1px solid white; text-align: center;" name="submit_btn" value="Salvar" class="btn-submit">

        </form>


</body>

</html>

<?php

require "../controllers/processo_controller.php";

if (isset($_POST['submit_btn'])) {
    $processo = new ProcessoController();
    $processo->createProcesso();
}
?>