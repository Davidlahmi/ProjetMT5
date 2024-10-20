<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PhotographeController extends AbstractController
{
    #[Route('/photographe', name: 'app_photographe')]
    public function index(): Response
    {
        return $this->render('photographe/photographe.html.twig');
    }
}
