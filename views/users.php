<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juris - Pessoas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <div class=container>
        <h1>Cadastro de usuários</h1>
        <br>
        <table class='table table-dark table-striped table-bordered table-hover'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Celular</th>
                    <th>Nome Completo</th>
                </tr>
            </thead>

            <tbody>
                <?php
                require '../controllers/user_controller.php';
                $users = new UserController();
                $users->showUsers();
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>