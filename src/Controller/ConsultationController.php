<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ConsultationController extends AbstractController
{
    #[Route('/consultation/details', name: 'app_consultation_details')]
    public function details(): Response
    {
        return $this->render('pages/consultation/details.html.twig');
    }
}
