<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function createUser($name, $email)
    {
        // Ici, on utilise la classe User
        $user = new User($name, $email);

        
        // Traitement éventuel...
        return $user;
    }
}