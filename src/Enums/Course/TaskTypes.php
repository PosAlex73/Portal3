<?php

namespace App\Enums\Course;

use App\Enums\Enumable;

class TaskTypes
{
    use Enumable;

    public const THEORY = 'T';
    public const TEST = 'R';
    public const PRACTICE = 'P';
}