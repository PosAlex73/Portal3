<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/front/index', name: 'app_front_index')]
    public function index(): Response
    {
        return $this->render('front/index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
