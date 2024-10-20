<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngenieurController extends AbstractController
{
    #[Route('/ingenieur', name: 'app_ingenieur')]
    public function index(): Response
    {
        return $this->render('ingenieur/ingenieur.html.twig');
    }
}
