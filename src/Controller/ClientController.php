<?php

namespace App\Controller;

use App\Service\Page\ClientPageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientController extends AbstractController
{
    #[Route('/fiche-clients', name: 'app_clients')]
    public function index(ClientPageService $pageService): Response
    {
        return $this->render('pages/clients/index.html.twig', [
            'active_route' => 'app_clients',
            'active_label' => 'Fiche clients',
            'page_classes' => 'rdv-page clients-page',
            'main_classes' => 'clients-main',
            'content_classes' => 'dashboard-content--clients',
            'page' => $pageService->getPageData(),
        ]);
    }
}
