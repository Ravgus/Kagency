<?php

include_once 'interfaces/DB.php';

class PdoDB implements DB
{
    public function getConnection()
    {
        $params = parse_ini_file(ROOT.'/config/db.ini', true);

        $dsn = "mysql:host={$params['pdo']['host']};dbname={$params['pdo']['dbname']};charset={$params['pdo']['charset']}";

        try {
            $db = new PDO($dsn, $params['pdo']['user'], $params['pdo']['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }

        return $db;
    }
}