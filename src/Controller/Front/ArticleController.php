<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/front/article', name: 'app_front_article')]
    public function index(): Response
    {
        return $this->render('front/article/index.html.twig', [
            'controller_name' => 'ArticleController',
        ]);
    }
}
