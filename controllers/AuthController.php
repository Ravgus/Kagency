<?php

include_once ROOT.'/models/User.php';

class AuthController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function actionIndex()
    {
        require_once(ROOT . '/views/auth/login.php');
        Session::delete('error_msg');
        return true;
    }

    public function actionCheckUser()
    {
        $user = new User($this->db);
        $user = $user->get([$_POST['email'], $_POST['password']]);
        if ($user) {
            Session::set('auth', true); // авторизация
            header('Location: http://localhost:8080/admin');
        } else {
            Session::set('error_msg', 'Incorrect login or password');
            header('Location: http://localhost:8080/login');
        }
        return true;
    }

    public function actionLogout()
    {
        Session::clear();
        header('Location: http://localhost:8080/');
        return true;
    }
}