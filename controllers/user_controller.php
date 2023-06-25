<?php
require "../modules/connectors/db_connector.php";

require '../models/user.php';
require '../models/dao/user_dao.php';

class UserController {
    var $db;

    public function __construct()
    {
        $this->db = new dbConnector();
    }
    public function showUsers() {
        $users = new UserDao($this->db);
        $result = $users->getUsers();
        $this->db->connect()->close();

        if ($result->num_rows > 0) {  // Verifica se são retornadas linhas
            // Exibe os dados de cada linha retornada
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
            echo "<tr><td>Não foram retornados registros.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>"; // Não há linhas (registros) retornados
        }
    }
}
?>