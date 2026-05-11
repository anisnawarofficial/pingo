<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ClientController extends AbstractController
{
    #[Route('/fiche-clients', name: 'app_clients')]
    public function index(): Response
    {
        return $this->render('pages/clients/index.html.twig');
    }
}
