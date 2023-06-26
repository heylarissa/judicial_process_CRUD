<?php
echo "<form method='POST'>
        <input type='submit' name='logout' value='LogOut'>
    </form>";
if (isset($_POST['logout'])) {
    if (isset($_SESSION['login'])) {
        session_destroy();
        header("location: /index.html");
        exit();
    }
}
