<?php

namespace App\Session;

class User
{

    private static function init()
    {
        return session_status() !== PHP_SESSION_ACTIVE ? session_start() : true;
    }

    public static function startSession($name, $email)
    {
        self::init();

        $_SESSION['user'] = [
            'name' => $name,
            'email' => $email
        ];
    }

    public static function isLogged()
    {
        self::init();

        return isset($_SESSION['user']);
    }

    public static function getInfo()
    {
        self::init();

        return $_SESSION['user'] ?? [];
    }

    public static function logout()
    {
        self::init();
        unset($_SESSION['user']);
        header('Location: /');
        exit;
    }
}
