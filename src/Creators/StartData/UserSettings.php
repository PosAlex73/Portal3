<?php

namespace App\Creators\StartData;

class UserSettings
{
    protected static function getNewUserSettings()
    {
        return [
            \App\Enums\User\UserSettings::GET_ADMIN_NOTIFICATIONS => 'Y',
            \App\Enums\User\UserSettings::GET_NEWS_NOTIFICATIONS => 'Y',
            \App\Enums\User\UserSettings::SHOW_PROGRESS => 'Y',
            \App\Enums\User\UserSettings::SHOW_PUBLIC_PROFILE => 'Y',
        ];
    }
}