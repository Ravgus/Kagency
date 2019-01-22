<?php

class ErrorsController
{
    public function actionNotFound()
    {
        if (strpos($_SERVER['REQUEST_URI'], 'api/categories')) {
            echo json_encode([['error' => '404']]);
            return true;
        } else {
            require_once(ROOT . '/views/404.php');
            return true;
        }
    }

}