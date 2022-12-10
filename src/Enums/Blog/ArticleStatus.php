<?php

namespace App\Enums\Blog;

use App\Enums\Enumable;
use Symfony\Contracts\Translation\TranslatorInterface;

class ArticleStatus
{
    use Enumable;

    public const PUBLISHED = 'P';
    public const DISABLED = 'D';
    public const CREATED = 'C';
    public const DELETED = 'D';

    public static function getWithLabel(TranslatorInterface $translator)
    {
        $consts = static::getAll();
        $result = [];

        foreach ($consts as $const) {
            $result[$translator->trans('article_status_' . $const)] = $const;
        }

        return $result;
    }
}