<?php

namespace App\Controller;

use App\Entity\PetiteEnfance;
use App\Form\PetiteEnfanceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PetiteEnfanceController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/petite/enfance', name: 'app_petite_enfance')]
    public function index(): Response
    {
        return $this->render('petite_enfance/petite_enfance.html.twig');
    }

    #[Route('/cv1enfance', name: 'app_petite_enfance_form')]
    public function indexx(Request $request): Response
    {
        $cv = new PetiteEnfance();
        $form = $this->createForm(PetiteEnfanceType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($cv);
            $this->entityManager->flush();
        }

        return $this->render('petite_enfance/form_cv_1.html.twig', [
            'form' => $form->createView(),
            'cv' => $cv
        ]);
    }
}
