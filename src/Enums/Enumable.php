<?php

namespace App\Enums;

use function Symfony\Component\Translation\t;

trait Enumable
{
    public static function getAll()
    {
        $ref = new \ReflectionClass(static::class);
        return $ref->getConstants();
    }

    public static function getWithLabel()
    {
        if (!method_exists(static::class, 'getLabel')) {
            throw new \Exception('getLabel method not defined');
        }

        $values = static::getAll();
        $labels = [];

        foreach ($values as $value) {
            $labels[] = t(static::getLabel() . $value);
        }

        return array_combine($labels, $values);
    }
}
