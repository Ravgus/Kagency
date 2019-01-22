<?php

class CategoryProduct
{
    private $connection;

    public function __construct(DB $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function put($parameters)
    {
        $sql = 'SELECT MAX(id) as MaximumID FROM products'; // получение последнего id в products
        $count = $this->connection->query($sql);
        $count = $count->fetchAll(PDO::FETCH_ASSOC);
        $count = $count[0]['MaximumID'];

        $sql = "INSERT INTO categories_products (category_id, product_id) VALUES (?, ?)";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[0], $count));
            return true;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update($parameters)
    {
        $sql = "UPDATE categories_products SET category_id = ? WHERE product_id = ?";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[0], $parameters[1]));
            return true;
        } catch (PDOException $exception) {
            echo  $exception->getMessage();
            return false;
        }
    }
}