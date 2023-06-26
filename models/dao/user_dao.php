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
        $psswd = md5($user->getPasswd());
        $query = "INSERT INTO auth_user (email, celular, 
                                        username, passwd, 
                                        pessoa_id) 
                VALUES ('{$user->getEmail()}', '{$user->getCelular()}', 
                        '{$user->getUsername()}', '{$psswd}', 
                        '{$user->getPessoa()->getId()}');";

        $this->db->execute($query);
    }

    public function selectUser($username)
    {
        $query = "SELECT *
                    FROM auth_user
                    WHERE username = '{$username}'";
        $result = $this->db->execute($query);

        return $result;
    }

    public function getUsers()
    {
        $query = "SELECT * FROM auth_user;";
        return $this->db->execute($query);
    }

    public function updateUser(User $user)
    {
        $query = "UPDATE auth_user
                    SET email = '{$user->getEmail()}',
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
