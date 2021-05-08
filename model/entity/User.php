<?php


namespace app\model\entity;


use app\core\orm\DBModel;

class User extends DBModel
{
    public ?int $id;

    public ?string $name = '';

    public string $username = '';

    public string $password = '';

    public string $email = '';

    public string $image_url = '';

    public bool $is_admin = false;

    public static function tableName(): string
    {
        return 'user';
    }

    public function attributes(): array
    {
        return ['name', 'email', 'username', 'password', 'image_url', 'is_admin'];
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}