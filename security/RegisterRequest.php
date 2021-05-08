<?php


namespace app\security;

use app\core\orm\Model;

class RegisterRequest extends Model
{

    public string $email;

    public string $username;

    public string $password;

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function __toString()
    {
        return $this->email.$this->username.$this->password;
    }


}