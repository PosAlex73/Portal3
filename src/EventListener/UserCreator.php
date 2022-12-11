<?php

namespace App\EventListener;

use App\Creators\User\NewUserCreator;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserCreator
{
    public function __construct(protected EntityManagerInterface $entityManager){}

    public function postCreate(User $user, LifecycleEventArgs $lifecycleEventArgs)
    {
        (new NewUserCreator($user, $this->entityManager))->createNewUser();
    }
}