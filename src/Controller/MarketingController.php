<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MarketingController extends AbstractController
{
    #[Route('/marketing', name: 'app_marketing')]
    public function index(): Response
    {
        return $this->render('marketing/marketing.html.twig');
    }
}
