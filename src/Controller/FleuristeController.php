<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FleuristeController extends AbstractController
{
    #[Route('/fleuriste', name: 'app_fleuriste')]
    public function index(): Response
    {
        return $this->render('fleuriste/fleuriste.html.twig');
    }
}
