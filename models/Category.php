<?php

include_once ROOT . '/models/interfaces/IModel.php';

class Category implements IModel
{
    private $connection;

    public function __construct(DB $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function get($parameters = [], $id = null) {
        if (isset($id)) {
            $sql = "SELECT * FROM categories WHERE id = $id";
        } else {
            $sql = 'SELECT * FROM categories ORDER BY id';
        }

        $result = $this->connection->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function put($parameters)
    {
        $sql = "INSERT INTO categories (name) VALUES (?)";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[0]));
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function update($parameters)
    {
        $sql = "UPDATE categories SET name = ? WHERE id = ?";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[1], $parameters[0]));
            return true;
        } catch (PDOException $exception) {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categories WHERE id = ?";

        $result = $this->connection->prepare($sql);
        $result->execute(array($id));
    }
}