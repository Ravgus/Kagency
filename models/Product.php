<?php

include_once ROOT . '/models/interfaces/IModel.php';

class Product implements IModel
{
    private $connection;

    public function __construct(DB $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function get($parameters = [], $id = null) {
        if (isset($id)) { // получение продукта по id
            $sql = "SELECT * FROM products WHERE id = $id";
        } else {
            $sql = 'SELECT products.id, products.name, products.description, products.price, products.count FROM products INNER JOIN categories_products ON products.id = categories_products.product_id LEFT JOIN categories ON categories_products.category_id = categories.id ';
            if (count($parameters) == 0) { // получение всех продуктов
                $sql = 'SELECT * FROM products';
            } elseif (count($parameters) == 1) {
                if (is_numeric($parameters[0])) { // получение продуктов по id (для api)
                    $sql .= "WHERE categories.id = $parameters[0] GROUP BY products.id";
                } else { // получение продуктов по названию (для api)
                    $sql .= "WHERE categories.name = '$parameters[0]' GROUP BY products.id";
                }
            } else {
                if (is_numeric($parameters[0]) && is_numeric($parameters[1])) {
                    $sql .= "WHERE categories.id = $parameters[0] AND products.id = $parameters[1] GROUP BY products.id"; // получение продукта по id (для api)
                } else {
                    $sql .= "WHERE categories.name = '$parameters[0]' AND products.name = '$parameters[1]' GROUP BY products.id"; // получение продукта по названию (для api)
                }
            }
        }

        $result = $this->connection->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function put($parameters)
    {
        $sql = "INSERT INTO products (name, description, price, count) VALUES (?, ?, ?, ?)";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[0], $parameters[1], $parameters[2], $parameters[3]));
            return true;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            return false;
        }
    }

    public function update($parameters)
    {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, count = ? WHERE id = ?";

        try {
            $result = $this->connection->prepare($sql);
            $result->execute(array($parameters[1], $parameters[2], $parameters[3], $parameters[4], $parameters[0]));
            return true;
        } catch (PDOException $exception) {
            echo  $exception->getMessage();
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id =  ?";

        $result = $this->connection->prepare($sql);
        $result->execute(array($id));
    }
}