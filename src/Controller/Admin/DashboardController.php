<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use App\Entity\Contacts;
use App\Entity\OpeningHours;
use App\Entity\Opinions;
use App\Entity\Prestations;
use App\Entity\Users;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Symfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fa-solid fa-users', Users::class);
        yield MenuItem::linkToCrud('Cars', 'fa-solid fa-car', Cars::class);
        yield MenuItem::linkToCrud('Opinions', 'fa-solid fa-comment', Opinions::class);
        yield MenuItem::linkToCrud('Contacts', 'fa fa-list', Contacts::class);
        yield MenuItem::linkToCrud('Prestations', 'fa-solid fa-screwdriver-wrench', Prestations::class);
        yield MenuItem::linkToCrud('OpeningHours', 'fa-solid fa-clock', OpeningHours::class);
    }
}
