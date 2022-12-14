<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/front/search', name: 'app_front_search')]
    public function index(): Response
    {
        return $this->render('front/search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
}
