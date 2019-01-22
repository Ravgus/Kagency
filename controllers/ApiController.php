<?php

include_once ROOT.'/models/Product.php';
include_once ROOT.'/models/Category.php';

class ApiController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function actionGetCategories()
    {
        $categories = new Category($this->db);
        echo json_encode($categories->get());
        return true;
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