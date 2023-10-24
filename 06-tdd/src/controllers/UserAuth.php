<?php

namespace Src\controllers;

use Src\config\Conection;
use Src\models\UserAuthModel;
use PDOException;

// Crear una clase de Autenticación

// Register y Login Retornan True o False

class UserAuth extends UserAuthModel
{
    public function register()
    {
        
        try {
            $db = new Conection();
            $query = "INSERT INTO users (username,password,email) VALUES (:username,:password,:email) ";
            $stmt = $db->conexion->prepare($query);
            $password = $this->encrypt($this->password);
            $stmt->bindParam(':username', $this->username);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            echo "\n Error " . $e->getMessage() . " line " . $e->getLine() . " code " . $e->getCode()."\n";
            return false;
        }

    }

    public function login()
    {
        try {
            $db = new Conection();
            $query = "SELECT password FROM users where :username";
            $stmt = $db->conexion->prepare($query);
            $stmt->bindParam(':username', $this->username);
            $hash = $stmt->execute();
            $this->passverify($this->password, $hash);
            echo "\n Usuario Logueado";
            return true;
        } catch (PDOException $e){
            echo "\n Error " . $e->getMessage() . " line " . $e->getLine() . " code " . $e->getCode()."\n";
            return false;
        }
    }

    public function encrypt($password)
    {
        return password_hash($password,PASSWORD_BCRYPT);
    }

    public function passverify($password , $hash)
    {
        return password_verify($password, $hash);
    }
}

