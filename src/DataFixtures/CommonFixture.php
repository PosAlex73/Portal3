<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CommonFixture extends Fixture
{
    protected $userCount = 100;

    public function load(ObjectManager $manager): void
    {
        $f = Factory::create();

    }
}
