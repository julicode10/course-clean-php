<?php

namespace Src\models;

// Conexion DB

// Crear una clase que internamente maneje los querys

class UserAuthModel
{
    // register(){} Correos Unicos a nivel de BD
    // login(){}
    protected $username;
    protected $password;
    protected $email;
    public function __construct(string $username, string $password, string $email = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    
}
