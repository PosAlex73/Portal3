<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    #[Route('/front/task', name: 'app_front_task')]
    public function index(): Response
    {
        return $this->render('front/task/index.html.twig', [
            'controller_name' => 'TaskController',
        ]);
    }
}
