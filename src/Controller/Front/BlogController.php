<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/front/blog', name: 'app_front_blog')]
    public function index(): Response
    {
        return $this->render('front/blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
}
