<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Exceptions\InvalidArgumentsException;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function getNickname(): string
    {
        return $this->nickname;
    }


    public function getRole(): string
    {
        return $this->role;
    }

    public function isAdmin(): bool
    {
        if ($this->role !== 'admin') {
            return false;
        }

        return true;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

    public static function signUp(array $userData): self
    {

        if (empty($userData['nickname'])) {
            throw new InvalidArgumentsException('Не передан nickname');
        }   

        if (!preg_match('#[a-zA-Z\d]+#', $userData['nickname'])) {
            throw new InvalidArgumentsException('Nickname может состоять только из символов латинского алфавита и цифр');
        }   

        if (empty($userData['email'])) {
            throw new InvalidArgumentsException('Не передан email');
        }   

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentsException('Email некорректен');
        }   

        if (empty($userData['password'])) {
            throw new InvalidArgumentsException('Не передан password');
        }   

        if (mb_strlen($userData['password']) < 8) {
            throw new InvalidArgumentsException('Пароль должен быть не менее 8 символов');
        }

        if (static::findValueInColumn('nickname', $_POST['nickname']) !== null){
            throw new InvalidArgumentsException('Пользователь с заданным никнеймом уже существует.');
        }

        if (static::findValueInColumn('email', $_POST['email']) !== null){
            throw new InvalidArgumentsException('Пользователь с заданной электронной почтой уже существует.');
        }

        $user = new Self();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->isConfirmed = false;
        $user->role = 'user';
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();
        return $user;
    }

    public static function login(array $loginData): User
    {
        if (empty($loginData['email'])) {
            throw new InvalidArgumentsException('Не передан email');
        }

        if (empty($loginData['password'])) {
            throw new InvalidArgumentsException('Не передан password');
        }

        $user = User::findValueInColumn('email', $loginData['email']);
        if ($user === null) {
            throw new InvalidArgumentsException('Нет пользователя с таким email');
        }

        if (!password_verify($loginData['password'], $user->getPasswordHash())) {
            throw new InvalidArgumentsException('Неправильный пароль');
        }

        if (!$user->isConfirmed) {
            throw new InvalidArgumentsException('Пользователь не подтвержден');
        }

        $user->refreshAuthToken();
        $user->save();

        return $user;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function refreshAuthToken()
    {
        $this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }

    public function getAuthToken()
    {
        return $this->authToken;
    }
}