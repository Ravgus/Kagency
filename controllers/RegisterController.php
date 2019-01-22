<?php

include_once ROOT.'/components/Validator.php';
include_once ROOT.'/models/User.php';

class RegisterController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function actionIndex()
    {
        require_once(ROOT . '/views/auth/register.php');
        Session::delete('error_msg');
        return true;
    }

    public function actionCreateUser()
    {
        $check = Validator::validateUser(['name' => $_POST['name'], 'email' => $_POST['email'], 'password' => $_POST['password']]);

        if ($check == 'success') {
            $user = new User($this->db);
            if ($user->put([$_POST['name'], $_POST['email'], $_POST['password']])) {
                Session::set('auth', true); // авторизация
                header('Location: http://localhost:8080/admin');
            } else {
                Session::set('error_msg', 'This user is already exists!');
            }
        } else {
            Session::set('error_msg', $check);
        }

        header('Location: http://localhost:8080/registration');
        return true;
    }
}