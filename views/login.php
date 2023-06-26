<?php
  session_start(); // Cria uma sessão ou retoma a sessão atual
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Juris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <div class="login">
        <?php
        include "components/go_back.php";
        ?>
        <h1>Login</h1>
        <form class="login-form" action="#" method="post">
            <input label="Username" name="username" required placeholder="Usuário">
            <input label="Password" name="password" type="Password" required placeholder="Senha" placeholder="sua senha" required>
            <input type="submit" name="access_btn" value="Login" class="btn-submit">
        </form>
        <?php
        require_once "../controllers/user_controller.php";

        if (isset($_POST["access_btn"])) {
            $controller = new UserController();
            $auth = $controller->authenticate();
        }
        ?>
    </div>
</body>

</html>