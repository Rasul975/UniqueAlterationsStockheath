<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DryCleaningController extends AbstractController
{
    #[Route('/dry/cleaning', name: 'app_dry_cleaning')]
    public function index(): Response
    {
        return $this->render('dry_cleaning/index.html.twig', [
            'controller_name' => 'DryCleaningController',
        ]);
    }
}
