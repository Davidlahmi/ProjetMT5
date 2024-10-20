<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExperienceNiveauController extends AbstractController
{
    #[Route('/experience', name: 'app_experience_niveau')]
    public function index(): Response
    {
        return $this->render('experience_niveau/experienceniveau.html.twig');
    }
}
