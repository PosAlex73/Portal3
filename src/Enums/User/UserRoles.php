<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class UserRoles
{
    use Enumable;

    public const ROLE_USER = 'ROLE_USER';
    public const ROLE_ADMIN = 'ROLE_ADMIN';

    public function getAdminRoles()
    {
        return [
            static::ROLE_ADMIN
        ];
    }

    public function getUserRoles()
    {
        return [
            static::ROLE_USER
        ];
    }
}