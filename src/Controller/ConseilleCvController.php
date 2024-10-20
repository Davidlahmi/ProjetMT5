<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseilleCvController extends AbstractController
{
    #[Route('/conseils/cv', name: 'app_conseille_cv')]
    public function index(): Response
    {
        return $this->render('conseille_cv/conseille_cv.html.twig');
    }
}
