<?php

namespace App\Enums;

trait Enumable
{
    public static function getAll()
    {
        $ref = new \ReflectionClass(static::class);
        return $ref->getConstants();
    }
}
