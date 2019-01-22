<?php

include_once ROOT . '/models/interfaces/IModel.php';

class User implements IModel
{
    private $connection;

    public function __construct(DB $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function get($parameters, $id = null) {
        $sql = "SELECT passwd FROM users WHERE email = ?";

        $result = $this->connection->prepare($sql);
        $result->execute(array($parameters[0]));

        $passwd = $result->fetchAll(PDO::FETCH_ASSOC)[0] ?? null;

        if(password_verify($parameters[1], $passwd['passwd']))
            return true;
        else
            return false;
    }

    public function put($parameters) {
        $sql = "INSERT INTO users (name, email, passwd, reg_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[0], $parameters[1], password_hash($parameters[2], PASSWORD_DEFAULT)));
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function update($parameters)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}