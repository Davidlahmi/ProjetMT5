<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\FormUserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RegisterController extends AbstractController
{
    private $entityManager;
    private $requestStack;
    private $tokenStorage;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack, TokenStorageInterface $tokenStorage)
    {
        $this->entityManager = $entityManager;
        $this->requestStack = $requestStack;
        $this->tokenStorage = $tokenStorage;
    }

    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $form = $this->createForm(FormUserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_login');
        }

        return $this->render('register/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/supprimer-compte', name: 'app_delete_account')]
    public function deleteAccount(): Response
    {
        $user = $this->getUser();

        if ($user) {
            $this->entityManager->remove($user);
            $this->entityManager->flush();

            // Invalide la session de l'utilisateur pour le déconnecter
            $this->tokenStorage->setToken(null);
            $session = $this->requestStack->getSession();
            $session->invalidate();

            return $this->redirectToRoute('app_home_page');
        }

        return $this->redirectToRoute('app_login');
    }
}
