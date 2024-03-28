<?php

namespace App\Tools;

use App\Entity\User;

class Security extends Tools    
{
    public function verifyPassword(string $password): bool
    {
        if (password_verify($password, $this->password)) {
            return true;
        } else {
            return false;
        }
    }

    public static function isLogged(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function isUser(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user';
    }

    public static function isAdmin(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
    }

    public static function isEmployee(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'employee';
    }

    public static function isVeterinary(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'veterinary';
    }

    public static function getCurrentUserId(): int|bool
    {
        return (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) ? $_SESSION['user']['id'] : false;
    }
}
