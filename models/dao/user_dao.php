<?php
class UserDao
{
    private dbConnector $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertUser(User $user)
    {
        $query = "INSERT INTO auth_user (first_name, last_name, 
                                        email, celular, 
                                        username, passwd, 
                                        pessoa_id) 
                VALUES ('{$user->getFirstName()}', '{$user->getLastName()}', 
                        '{$user->getEmail()}', '{$user->getCelular()}', 
                        '{$user->getUsername()}', '{$user->getPasswd()}', 
                        '{$user->getPessoa()->getId()}');";

        $this->db->execute($query);
    }

    public function selectUser($id)
    {
        $query = "SELECT * , pessoas.nome nome_completo 
                    FROM auth_user WHERE id = '{$id}'
                    LEFT JOIN pessoas ON pessoas.id = auth_user.pessoa_id;";
        return $this->db->execute($query);
    }

    public function getUsers()
    {
        $query = "SELECT * FROM auth_user;";
        return $this->db->execute($query);
    }

    public function updateUser(User $user)
    {
        $query = "UPDATE auth_user
                    SET first_name = '{$user->getFirstName()}',
                        last_name = '{$user->getLastName()}',
                        email = '{$user->getEmail()}',
                        celular = '{$user->getCelular()}',
                        username = '{$user->getUsername()}',
                        passwd = md5('{$user->getPasswd()}'),
                        pessoa_id = '{$user->getPessoa()->getId()}'
                    WHERE id = '{$user->getPessoa()->getId()}';";
        $this->db->execute($query);
    }

    public function deleteUser(User $user)
    {
        $query = "DELETE FROM auth_user WHERE id= '{$user->getPessoa()->getId()}'";
        $this->db->execute($query);
    }
}
