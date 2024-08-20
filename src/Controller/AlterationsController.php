<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AlterationsController extends AbstractController
{
    #[Route('/alterations', name: 'app_alterations')]
    public function index(): Response
    {
        return $this->render('alterations/index.html.twig', [
            'controller_name' => 'AlterationsController',
        ]);
    }
}
