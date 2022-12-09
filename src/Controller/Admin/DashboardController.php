<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Catetory;
use App\Entity\Course;
use App\Entity\Order;
use App\Entity\Subscription;
use App\Entity\Task;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portal3');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Courses', 'fa fa-user', Course::class),
            MenuItem::linkToCrud('Tasks', 'fa fa-user', Task::class),
            MenuItem::linkToCrud('Orders', 'fa fa-user', Order::class),
            MenuItem::linkToCrud('Subscriptions', 'fa fa-user', Subscription::class),
            MenuItem::linkToCrud('Categories', 'fa fa-user', Catetory::class),
            MenuItem::linkToCrud('Articles', 'fa fa-user', Article::class),
        ];

    }
}
