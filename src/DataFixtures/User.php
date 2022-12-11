<?php

namespace App\DataFixtures;

use App\Enums\User\UserStatuses;
use App\Enums\User\UserTypes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class User extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $adminUser = new \App\Entity\User();
        $adminUser->setEmail('admin@admin.ru');
        $adminUser->setRoles([
            'ROLE_ADMIN'
        ]);
        $adminUser->setFirstname('admin');
        $adminUser->setLastname('admin');
        $adminUser->setType(UserTypes::ADMIN);
        $adminUser->setStatus(UserStatuses::ACTIVE);
        $adminUser->setPassword('$2y$13$9rc8/I1mfpkC3getkXj8i.92fgRHD.LIrRzx1XmVKDVQluH.gt/TK');

        $manager->persist($adminUser);
        $manager->flush();

        $simpleUser = new \App\Entity\User();
        $simpleUser->setEmail('user@user.ru');
        $simpleUser->setRoles([
            'ROLE_USER'
        ]);
        $simpleUser->setFirstname('user');
        $simpleUser->setLastname('user');
        $simpleUser->setType(UserTypes::SIMPLE);
        $simpleUser->setStatus(UserStatuses::ACTIVE);
        $simpleUser->setPassword('$2y$13$WwkD4zQWJJNf3/aRdQZjJ..lSdykWFGc9YVSIN.gL7Poll6rqGwyK');
        $manager->persist($simpleUser);
        $manager->flush();
    }
}
