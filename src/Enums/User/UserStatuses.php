<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class UserStatuses
{
    use Enumable;

    public const ACTIVE = 'A';
    public const DISABLES = 'D';
    public const PENDING = 'P';
    public const BANNED = 'B';
}