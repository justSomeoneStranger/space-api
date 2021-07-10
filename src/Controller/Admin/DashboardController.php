<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use App\Entity\Table;
use App\Entity\Event;
use App\Entity\Category;
use App\Entity\Information;
use App\Entity\Dish;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('The Space Api');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('category', 'fas fa-list', Category::class);
         yield MenuItem::linkToCrud('dish', 'fas fa-list', Dish::class);
         yield MenuItem::linkToCrud('reservation', 'fas fa-list', Reservation::class);
         yield MenuItem::linkToCrud('Event', 'fas fa-list', Event::class);
         yield MenuItem::linkToCrud('Information', 'fas fa-list', Information::class);
         yield MenuItem::linkToCrud('Table', 'fas fa-list', Table::class);




        }
}
