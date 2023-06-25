<?php
require_once "../modules/connectors/db_connector.php";

require_once '../models/user.php';
require_once '../models/dao/user_dao.php';

class UserController {
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }

    public function createUser ($pessoa_id) {
        $username = $_POST['username'];
        $psswd = $_POST['senha'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];

        $user = new User();
        $user->setUsername($username);
        $user->setPasswd($psswd);
        $user->setEmail($email);
        $user->setCelular($celular);
        $user->setPessoa($pessoa_id);

        $userDAO = new UserDAO($this->db);
        $userDAO->insertUser($user);
        $this->db->getConnection()->close();
    }
    
    public function showUsers() {
        $users = new UserDao($this->db);
        $result = $users->getUsers();
        $this->db->connect()->close();

        if ($result->num_rows > 0) { 
            while ($user = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $user["id"] . "</td>
                        <td>" . $user["username"] . "</td>
                        <td>" . $user["email"] . "</td>
                        <td>" . $user["celular"] . "</td>
                        <td>" . $user["nome_completo"] . "</td>
                    </tr>";
            }
        } else {
            echo "<tr>
                    <td>Não foram retornados registros.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>";
        }
    }
}
?>