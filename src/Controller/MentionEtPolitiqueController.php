<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MentionEtPolitiqueController extends AbstractController
{
    #[Route('/mention', name: 'app_mention')]
    public function index(): Response
    {
        return $this->render('MentionEtPolitique/Mention_legale.html.twig');
    }

    #[Route('/politique', name: 'app_politique')]
    public function indexx(): Response
    {
        return $this->render('MentionEtPolitique/Politique_de_confidentialite.html.twig');
    }
}
