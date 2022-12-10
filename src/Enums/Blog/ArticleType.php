<?php

namespace App\Enums\Blog;

use App\Enums\Enumable;

class ArticleType
{
    use Enumable;

    public const COMMON = 'C';

    public static function getLabel()
    {
        return 'article_type_';
    }
}