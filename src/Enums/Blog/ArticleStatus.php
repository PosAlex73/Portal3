<?php

namespace App\Enums\Blog;

use App\Enums\Enumable;
use Symfony\Contracts\Translation\TranslatorInterface;
use function Symfony\Component\Translation\t;

class ArticleStatus
{
    use Enumable;

    public const PUBLISHED = 'P';
    public const DISABLED = 'D';
    public const CREATED = 'C';
    public const DELETED = 'F';

    public static function getLabel()
    {
        return 'article_status_';
    }
}