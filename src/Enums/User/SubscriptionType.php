<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class SubscriptionType
{
    use Enumable;

    public const ACTIVE = 'A';
    public const DISABLED = 'D';
}