<?php

class MainPageController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function actionIndex() // отображение главной страницы
    {
        require_once(ROOT . '/views/index.php');
        return true;
    }
}

