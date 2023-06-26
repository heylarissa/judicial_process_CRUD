<?php
require "components/auth.php";
require "components/logout.php";

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juris - Processos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class=container>
        <?php
        include "components/go_back.php";
        ?>
        <h1>Cadastro de processos</h1>
        <br>
        <a href="processo_create.php"><button>Cadastrar processo</button></a>
        <table class='table table-dark table-striped table-bordered table-hover'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Advogado</th>
                    <th>Cliente</th>
                    <th>Número do Processo</th>
                    <th>Arquivado</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                require '../controllers/processo_controller.php';

                $processos = new ProcessoController();
                $processos->showProcessos();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>

