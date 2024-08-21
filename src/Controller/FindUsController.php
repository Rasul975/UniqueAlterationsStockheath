<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FindUsController extends AbstractController
{
    #[Route('/find-us', name: 'app_find_us')]
    public function index(): Response
    {
        return $this->render('find_us/index.html.twig', [
            'controller_name' => 'FindUsController',
            'google_maps_api_key' => $_ENV['GOOGLE_MAPS_API_KEY'],
        ]);
    }
}
