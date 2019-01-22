<?php

include_once ROOT.'/models/Category.php';

class CategoryController
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
}