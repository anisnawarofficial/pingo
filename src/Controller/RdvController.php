<?php

namespace App\Controller;

use App\Service\Page\RdvPageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RdvController extends AbstractController
{
    #[Route('/rdv', name: 'app_rdv')]
    public function index(RdvPageService $pageService): Response
    {
        return $this->render('pages/rdv/index.html.twig', [
            'active_route' => 'app_rdv',
            'active_label' => 'Accueil',
            'page_classes' => 'rdv-page',
            'main_classes' => 'rdv-main',
            'content_classes' => 'dashboard-content--rdv',
            'page_attrs' => 'data-rdv-page',
            'page' => $pageService->getPageData(),
        ]);
    }
}
