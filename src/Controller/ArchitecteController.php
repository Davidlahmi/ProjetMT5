<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArchitecteController extends AbstractController
{
    #[Route('/architecte', name: 'app_architecte')]
    public function index(): Response
    {
        return $this->render('architecte/architecte.html.twig');
    }
}
