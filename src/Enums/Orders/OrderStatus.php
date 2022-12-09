<?php

namespace App\Enums\Orders;

use App\Enums\Enumable;

class OrderStatus
{
    use Enumable;

    public const PAID = 'P';
    public const PROCESS = 'A';
    public const CANCEL = 'C';
    public const ARCHIVE = 'R';
    public const FAIL = 'F';
    public const OVERVIEW = 'W';
}