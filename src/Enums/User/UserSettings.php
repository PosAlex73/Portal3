<?php

namespace App\Enums\User;

use App\Enums\Enumable;

class UserSettings
{
    use Enumable;

    public const GET_ADMIN_NOTIFICATIONS = 'get_admin_notifications';
    public const GET_NEWS_NOTIFICATIONS = 'get_news_notifications';
    public const SHOW_PROGRESS = 'show_progress';
    public const SHOW_PUBLIC_PROFILE = 'show_public_profile';


}