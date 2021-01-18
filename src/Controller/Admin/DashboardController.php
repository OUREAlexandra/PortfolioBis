<?php

namespace App\Controller\Admin;

use App\Entity\Design;
use App\Entity\ImgDesign;
use App\Entity\ImgProject;
use App\Entity\Project;
use App\Entity\Techno;
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
            ->setTitle('Portofolio 2');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Design', 'fas fa-list', Design::class);
        yield MenuItem::linkToCrud('ImgDesign', 'fas fa-list', ImgDesign::class);
        yield MenuItem::linkToCrud('ImgProject', 'fas fa-list', ImgProject::class);
        yield MenuItem::linkToCrud('Project', 'fas fa-list', Project::class);
        yield MenuItem::linkToCrud('Techno', 'fas fa-list', Techno::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
