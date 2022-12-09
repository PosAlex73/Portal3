<?php

namespace App\Enums\Blog;

use App\Enums\Enumable;

class ArticleStatus
{
    use Enumable;

    public const PUBLISHED = 'P';
    public const DISABLED = 'D';
    public const CREATED = 'C';
    public const DELETED = 'D';
}