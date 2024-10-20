<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeDeCreationDeCvController extends AbstractController
{
    #[Route('/liste/de/creation/de/cv', name: 'app_liste_de_creation_de_cv')]
    public function index(): Response
    {
        return $this->render('liste_de_creation_de_cv/cvcreation.html.twig');
    }
}
