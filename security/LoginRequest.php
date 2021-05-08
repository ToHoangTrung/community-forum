<?php


namespace app\security;

use app\core\orm\Model;

class LoginRequest extends Model
{
    public string $email;

    public string $password;

}