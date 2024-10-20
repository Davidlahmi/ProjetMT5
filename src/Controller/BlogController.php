<?php

namespace App\Controller;

use App\Repository\BlogRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    #[Route('/blog', name: 'app_blog')]
    public function index(BlogRepository $blogRepository): Response
    {
        // Récupère tous les articles de blog
        $articles = $blogRepository->findAll();

        return $this->render('blog/blog.html.twig', [
            'articles' => $articles,
        ]);
    }
}
