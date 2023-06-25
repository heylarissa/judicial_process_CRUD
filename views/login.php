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
        <a href="javascript:history.back()">Go Back</a>

        <h1>Login</h1>
        <form class="login-form" action="processos.php" method="post">
            <input label="Username" required placeholder="Usuário">
            <input label="Password" type="Password" required placeholder="Senha" placeholder="sua senha" required>
            <input type="submit" name="submit_btn" value="Enviar" class="btn-submit">
        </form>
    </div>
</body>

</html>