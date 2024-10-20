<?php

namespace App\Controller;

use App\Repository\MescvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesCvController extends AbstractController
{
    #[Route('/mes/cv', name: 'app_mes_cv')]
    public function index(MescvRepository $mescvRepository): Response
    {
        // Récupérer l'utilisateur connecté
        $user = $this->getUser();

        // Récupérer les CVs créés par l'utilisateur connecté
        $mescvs = $mescvRepository->findBy(['user' => $user]);

        // Renvoyer la vue avec la liste des CVs
        return $this->render('mes_cv/mescv.html.twig', [
            'mescvs' => $mescvs,
        ]);
    }
}
