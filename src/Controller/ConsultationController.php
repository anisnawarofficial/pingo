<?php

namespace App\Controller;

use App\Service\Page\ConsultationDetailsPageService;
use App\Service\Page\ConsultationListPageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConsultationController extends AbstractController
{
    #[Route('/consultation/en-communication', name: 'app_consultation_en_communication')]
    public function enCommunication(ConsultationListPageService $pageService): Response
    {
        return $this->render('pages/consultation/en-communication.html.twig', [
            'active_route' => 'app_consultation_en_communication',
            'active_label' => 'Consultation',
            'active_submenu' => 'En Communication',
            'page_classes' => 'rdv-page consultation-list-page',
            'main_classes' => 'consultation-list-main',
            'content_classes' => 'dashboard-content--consultation-list',
            'page' => $pageService->getPageData(),
        ]);
    }

    #[Route('/consultation/details', name: 'app_consultation_details')]
    public function details(ConsultationDetailsPageService $pageService): Response
    {
        return $this->render('pages/consultation/details.html.twig', [
            'active_route' => 'app_consultation_details',
            'active_label' => 'Consultation',
            'active_submenu' => 'Détails de consultation',
            'page_classes' => 'rdv-page consultation-page',
            'main_classes' => 'consultation-main',
            'content_classes' => 'dashboard-content--consultation',
            'page' => $pageService->getPageData(),
        ]);
    }
}
