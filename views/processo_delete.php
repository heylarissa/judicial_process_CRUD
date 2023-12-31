<?php
require "components/auth.php";
$id = $_GET['id'];

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
    <?php
    require 'components/juris-nav.php';
    ?>
    <div id="main" class=container>
        <?php
        include "components/go_back.php";
        ?>
        <h3>Certeza de que deseja excluir esse processo?</h3>
        <span>Essa ação é irreversível</span>
        <form method='POST' action="#">
            <input type='submit' style="color:white; background:none;border: 1px solid white; text-align: center;"  name="delete" value="Excluir">
            <input type='submit' style="color:white; background:none;border: 1px solid white; text-align: center;" name="notdelete" value="Não">

        </form>

        <?php
        require_once "../controllers/processo_controller.php";
        $controller = new ProcessoController();
        if (isset($_POST['delete'])) {
            $controller->deleteProcesso($id);
            header("Location: /views/processos.php", TRUE, 301);
            exit();
        } elseif (isset($_POST['notdelete'])) {
            header("Location: /views/processos.php", TRUE, 301);
            exit();
        }
        ?>
        <br>

    </div>

</body>

</html>