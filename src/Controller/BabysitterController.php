<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BabysitterController extends AbstractController
{
    #[Route('/babysitter', name: 'app_babysitter')]
    public function index(): Response
    {
        return $this->render('babysitter/babysitter.html.twig');
    }
}
