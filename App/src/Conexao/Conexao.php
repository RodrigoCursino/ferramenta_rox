<?php

namespace App\src\Conexao;

class Conexao
{
    public static $instance;

    private function __construct()
    {
    }

    public static function getInstance()
    {

        $database = 'roxon';

        $dsn  = "mysql:host=localhost;dbname=$database";
        $user = 'root';
        $pass = '';

        if (!isset(self::$instance)) {
            self::$instance = new \PDO($dsn, $user, $pass);
        }

        return self::$instance;
    }
}