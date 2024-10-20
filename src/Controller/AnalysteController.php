<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnalysteController extends AbstractController
{
    #[Route('/analyste', name: 'app_analyste')]
    public function index(): Response
    {
        return $this->render('analyste/analyste.html.twig');
    }
}
