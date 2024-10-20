<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommercialController extends AbstractController
{
    #[Route('/commercial/{experience}', name: 'app_commercial')]
    public function index(string $experience): Response
    {
        if ($experience === 'alternance') {
            return $this->render('commercial/commercial_cv/cv_alternance.html.twig');
        } elseif ($experience === 'FinEtude') {
            return $this->render('commercial/commercial_cv/cv_FinEtude.html.twig');
        } elseif ($experience === '0-10-ans') {
            return $this->render('commercial/commercial_cv/cv_0_10_ans.html.twig');
        } elseif ($experience === 'PlusDe10ans') {
            return $this->render('commercial/commercial_cv/cv_PlusDe10ans.html.twig');
        } elseif ($experience === 'TousCv') {
            return $this->render('commercial/commercial_cv/cv_tous.html.twig');
        }
    }
}
