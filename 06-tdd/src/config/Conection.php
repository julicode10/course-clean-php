<?php

namespace Src\config;

use PDO;
use PDOException;

class Conection{
    public $conexion;

    public function __construct($host='localhost', $db='user_auth', $user='root', $password='root')
    {
        try {
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
            $this->conexion = new PDO('mysql:host='. $host . ';dbname='. $db,
            $user, $password , $options);
        } catch (PDOException $e) {
            echo "Error ! " . $e->getMessage() . "\n";
        }
    }
}