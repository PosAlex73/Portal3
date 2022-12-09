<?php

namespace App\Enums\UserMessages;

use App\Enums\Enumable;

class MessageStatus
{
    use Enumable;

    public const ACTIVE = 'A';
    public const MODERATION = 'M';
    public const DISABLED = 'D';
}