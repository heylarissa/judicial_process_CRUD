<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Processos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>

    <div class=container>
        <h1>Cadastro de processos</h1>
        <br>
        <table class='table table-dark table-striped table-bordered table-hover'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Advogado ID</th>
                    <th>Cliente ID</th>
                    <th>Número do Processo</th>
                    <th>Arquivo</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require '../controllers/processos.php';

                $processos = new ProcessoController();
                $result = $processos->getProcessos();

                if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
                    // Exibe os dados de cada linha retornada
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["advogado_id"] . "</td>
                                <td>" . $row["cliente_id"] . "</td>
                                <td>" . $row["numero_processo"] . "</td>
                                <td>" . $row["arquivo"] . "</td>
                            </tr>";
                    }
                } else {
                    echo "Não foram retornados registros."; // Não há linhas (registros) retornados
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>