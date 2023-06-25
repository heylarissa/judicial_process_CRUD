<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juris - Processos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class=container>
        <h1>Novo processo</h1>
        <br>

        <form method="POST" action="#">
            <div class="form-group">
                <label for="exampleFormControlInput1">Número do Processo</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="numero_processo" placeholder="">
            </div>
            <?php
            require_once "../controllers/pessoa_controller.php";
            $advogados = new PessoaController();
            $advogados->listAdvogados();

            $clientes = new PessoaController();
            $clientes->listClientes();

            ?>
            <div class="form-check">
                <input name="arquivo" type="checkbox" class="form-control-input" id="exampleFormControlInput1" placeholder="">
                <label class="form-check-label" for="flexCheckChecked">
                    Arquivado
                </label>
            </div>
            <input type="submit" name="submit_btn" value="Enviar" class="btn-submit">

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