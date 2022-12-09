<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class UserProgressStatus
{
    use Enumable;

    public const DONE = 'D';
    public const IN_PROGRESS = 'P';
    public const REPORT = 'R';
    public const OPEN = 'O';
}