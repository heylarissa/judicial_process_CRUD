<?php
require_once "../controllers/processo_controller.php";
require_once "../controllers/pessoa_controller.php";

$id = $_GET['id'];

$controller = new ProcessoController();
$processo = $controller->detailProcesso($id);

$controller_advogados = new PessoaController();
$controller_clientes = new PessoaController();

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
        <h1>Editar processo</h1>
        <form method='POST' action='#'>
            <div class="form-group">
                <label for="numero_processo">Número do processo</label>
                <input disabled="text" class="form-control" name="numero_processo" value="<?php echo $processo->getNumeroProcesso() ?>">
            </div>
            <br>
            <div class='form-group'>

                <?php
                $controller_advogados->listAdvogados($processo->getAdvogado()->getId());

                ?>
            </div>
            <br>
            <div class='form-group'>

                <?php
                $controller_clientes->listClientes($processo->getCliente()->getId());
                ?>
            </div>
            <br>
            <div class="form-check">
                <label class="form-check-label" for="flexCheckChecked">
                    Arquivado
                </label>
                <input name="arquivo" type="checkbox" class="form-control-input" id="arquivo">
            </div>
            <br>
            <input type="submit" style="color:white; background:none;border: 1px solid white; text-align: center;"  name="edit_btn" value="Salvar" class="btn-submit">
            <?php

            if (isset($_POST['edit_btn'])) {
                $controller->editProcesso($processo);
            }

            ?>
        </form>
    </div>
</body>

</html>