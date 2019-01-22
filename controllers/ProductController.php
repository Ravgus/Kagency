<?php

include_once ROOT.'/models/Product.php';

class ProductController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function actionGetProducts($parameter)
    {
        $products = new Product($this->db);
        echo json_encode($products->get([$parameter]));
        return true;
    }

    public function actionGetProduct($category, $goods)
    {
        $product = new Product($this->db);
        echo json_encode($product->get([$category, $goods]));
        return true;
    }
}