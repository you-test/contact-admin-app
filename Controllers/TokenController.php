<?php

class TokenController
{
    public const TOKEN_LENGTH = 32;

    public static function createToken(): void
    {
        $bytes = random_bytes(self::TOKEN_LENGTH);
        $_SESSION['token'] = bin2hex($bytes);
    }

    public static function validateToken(): void
    {
        if (empty($_SESSION['token']) || $_SESSION['token'] !== $_POST['token']) {
            exit('Invalid post request');
        }
    }
}
