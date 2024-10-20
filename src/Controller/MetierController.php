<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MetierController extends AbstractController
{
    #[Route('/metier/{experience}', name: 'app_metier')]
    public function index(string $experience): Response
    {
        return $this->render('metier/metier.html.twig', [
            'experience' => $experience,
        ]);
    }
}

