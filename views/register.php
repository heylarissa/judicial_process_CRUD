<?php
require "components/auth.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Juris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container">
        <?php
        require "components/go_back.php";
        ?>
        <h1>Registre-se</h1>
        <form class=" row login-form container" action="#" method="post">
            <div class=" col-4 form-group">
                <label for="nome">Nome completo</label>
                <input required type="text" class="form-control" name="nome" placeholder="">
            </div>
            <div class=" col-4 form-group">
                <label for="email">Email</label>
                <input required type="text" class="form-control" name="email" placeholder="fulano@exemplo.com">
            </div>
            <div class=" col-4 form-group">
                <label for="cpf">CPF</label>
                <input required type="text" class="form-control" name="cpf" placeholder="xxx.xxx.xxx-xx">
            </div>
            <div class=" col-8 form-group">
                <label for="endereco">Endereço</label>
                <input required type="text" class="form-control" name="endereco" placeholder="">
            </div>
            <div class="col-4 form-group">
                <label for="celular">Celular</label>
                <input required type="text" class="form-control" name="celular" placeholder="(41) 997643-987">
            </div>

            <div class="container row">
                <div class=" col-12 form-group">
                    <label for="username">Username</label>
                    <input required type="text" class="form-control" name="username" placeholder="Usuário">
                </div>
                <div class="col-6 form-group">
                    <label for="senha">Senha</label>
                    <input required type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" class="form-control" name="senha" placeholder="Senha">
                </div>
                <div class="col-6 form-group">
                    <label for="confirme_senha">Confirme a senha</label>
                    <input required type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" class="form-control" name="confirme_senha" placeholder="">
                </div>
                <div>
                    <ul>
                        <li>Um número.</li>
                        <li>Uma letra maiúscula.</li>
                        <li>Uma letra minúscula.</li>
                        <li>Um caractere especial.</li>
                        <li>Ter de 6 a 8 caracteres.</li>m0n3t!#LA
                    </ul>
                </div>
                <input type="submit" name="register_btn" value="Salvar" class="btn-submit">
            </div>
        </form>

    </div>
</body>

</html>

<?php
require_once "../controllers/user_controller.php";
require_once "../controllers/pessoa_controller.php";

if (isset($_POST['register_btn'])) {
    $psswd = $_POST['senha'];
    $psswd_conf = $_POST['confirme_senha'];

    if ($psswd != $psswd_conf) {
        echo "As senhas não são compatíveis";
    } else {

        $pessoa = new PessoaController();
        $pessoa_id = $pessoa->createPessoa(0);

        $user = new UserController();
        $user->createUser($pessoa_id);
    }
}
?>