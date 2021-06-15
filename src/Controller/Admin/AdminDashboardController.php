<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use App\Entity\Role;
use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
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
            ->setTitle('Espace administrateur - Loud');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Accueil', 'fa fa-home');
        yield MenuItem::section('Administration');
        yield MenuItem::linkToCrud('Sections', 'fas fa-users', Section::class);
        yield MenuItem::linkToCrud('Rôles', 'fas fa-crown', Role::class);
        yield MenuItem::linkToCrud('Membres', 'fas fa-user', Member::class);
    }
}
