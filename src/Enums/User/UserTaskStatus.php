<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class UserTaskStatus
{
    use Enumable;

    public const OPEN = 'O';
    public const IN_PROGRESS = 'P';
    public const DONE = 'D';
    public const FAIL = 'F';
    public const REPORT = 'R';
}