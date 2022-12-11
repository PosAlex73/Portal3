<?php

namespace App\Creators\User;

use App\Entity\User;
use App\Entity\UserProfile;
use App\Entity\UserSettings;
use Doctrine\ORM\EntityManagerInterface;

class NewUserCreator
{
    public function __construct(protected User $user, protected EntityManagerInterface $entityManager){}

    public function createNewUser()
    {
        $this->createProfile();
        $this->createSettings();
    }

    protected function createSettings()
    {
        $userSettings = new UserSettings();
        $userSettings->setGetAdminNotifications($userSettings[\App\Enums\User\UserSettings::GET_ADMIN_NOTIFICATIONS]);
        $userSettings->setGetNewsNotifications($userSettings[\App\Enums\User\UserSettings::GET_NEWS_NOTIFICATIONS]);
        $userSettings->setShowProgress($userSettings[\App\Enums\User\UserSettings::SHOW_PROGRESS]);
        $userSettings->setShowPublicProfile($userSettings[\App\Enums\User\UserSettings::SHOW_PUBLIC_PROFILE]);

        $userSettings->setUserId($this->user);
        $this->entityManager->persist($userSettings);
        $this->entityManager->flush();
    }

    protected function createProfile()
    {
        $userProfile = new UserProfile();
        $userProfile->setUserId($this->user->getId());

        $this->entityManager->persist($userProfile);
        $this->entityManager->flush();
    }
}