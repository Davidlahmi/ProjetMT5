<?php

namespace App\Controller;

use App\Entity\CvImmoUn;
use App\Entity\Mescv;
use App\Form\CvImmoUnType;
use Doctrine\ORM\EntityManagerInterface;
use setasign\Fpdi\Tcpdf\Fpdi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImmobilierController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/immobilier/{experience}', name: 'app_immobilier')]
    public function index(string $experience): Response
    {
        if ($experience === 'alternance') {
            return $this->render('immobilier/immobilier_cv/cv_alternance.html.twig');
        } elseif ($experience === 'FinEtude') {
            return $this->render('immobilier/immobilier_cv/cv_FinEtude.html.twig');
        } elseif ($experience === '0-10-ans') {
            return $this->render('immobilier/immobilier_cv/cv_0_10_ans.html.twig');
        } elseif ($experience === 'PlusDe10ans') {
            return $this->render('immobilier/immobilier_cv/cv_PlusDe10ans.html.twig');
        } elseif ($experience === 'TousCv') {
            return $this->render('immobilier/immobilier_cv/cv_tous.html.twig');
        }
    }


    #[Route('/cv1immobilier', name: 'app_immo')]
    public function indexx(Request $request): Response
    {
        $cv = new CvImmoUn();
        $form = $this->createForm(CvImmoUnType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $photoFile */
            $photoFile = $form->get('photopersonne')->getData();

            // Récupérer l'utilisateur connecté
            $user = $this->getUser();

            if ($user) {
                // Associer l'utilisateur connecté au CV
                $cv->setUser($user);
            }

            // Sauvegarder les données du CV dans la base de données
            $this->entityManager->persist($cv);
            $this->entityManager->flush();

            // Ajouter un nouveau CV dans la table 'Mescv'
            $mescv = new Mescv();
            $mescv->setTitle('CV Immobilier ' . $cv->getNom());  // Modifier si nécessaire
            $mescv->setFilename($cv->getId() . '_CONVENTION.pdf');
            $mescv->setUser($user);
            $mescv->setCreatedAt(new \DateTimeImmutable());

            // Sauvegarder les données de Mescv
            $this->entityManager->persist($mescv);
            $this->entityManager->flush();

            // Générer le PDF avec l'image
            $this->createpdf($cv, $photoFile);

            // Redirection vers la route de téléchargement avec l'ID
            return $this->redirectToRoute('cv_download_immobilier', ['id' => $cv->getId()]);
        }

        return $this->render('immobilier/immobilier_form/form_cv_1.html.twig', [
            'form' => $form->createView(),
            'cv' => $cv
        ]);
    }



    public function createpdf(CvImmoUn $cv, ?UploadedFile $photoFile = null)
    {
        $fichierpdfsource = $this->getParameter('kernel.project_dir') . '/public/assets/CvImmoGen.pdf';
        $fichierpdfcoller = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        $pdf = new Fpdi();
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(false, 0);

        $pageCount = $pdf->setSourceFile($fichierpdfsource);
        $pdf->AddPage();
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);

        // Nom, Prénom 
        $pdf->SetFont('ubuntur', '', 32);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(32, 20);
        $pdf->Write(0, strtoupper($cv->getNom()));

        $pdf->SetXY(32, 30);
        $pdf->Write(0, ucfirst(strtolower($cv->getPrenom())));

        // Coordonnées
        $pdf->SetFont('ubuntur', '', 12);
        $pdf->SetTextColor(255, 255, 255);

        $pdf->SetXY(33, 108);
        $pdf->Write(0, $cv->getAge() . ' ans - ' . $cv->getPermis());

        $pdf->SetXY(37, 116);
        $pdf->Write(0, $cv->getTelephone());

        $pdf->SetXY(28, 124);
        $pdf->Write(0, strtolower($cv->getEmail()));

        $pdf->SetXY(26, 132);
        $pdf->Write(0, $cv->getAdresse());

        // Profession avec saut de ligne
        $pdf->SetFont('ubuntur', '', 32);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(105, 20);

        // Séparer manuellement les mots et ajuster leur position Y
        $profession = explode(' ', $cv->getNomMetier());

        // Afficher le premier mot
        $pdf->Write(0, $profession[0]);

        // Vérifier s'il y a un deuxième mot avant de l'afficher
        if (isset($profession[1])) {
            // Réduire l'espacement pour le deuxième mot ("Immobilier")
            $pdf->SetXY(105, 31);  // Ajuster cette valeur selon tes besoins
            $pdf->Write(0, $profession[1]);
        }


        // Compétences
        $pdf->SetFont('ubuntur', '', 12);
        $pdf->SetTextColor(0, 0, 0);

        // Position initiale pour la première compétence
        $initialY = 77;
        $pdf->SetXY(108, $initialY);

        // Utilisation de MultiCell pour la première compétence
        $pdf->MultiCell(75, 6, ucfirst($cv->getCompetenceUne()), 0, 'L');
        $y = $pdf->GetY();  // Récupérer la position après la première MultiCell

        // Competence Deux
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getCompetenceDeux()), 0, 'L');
        $y = $pdf->GetY();  // Mettre à jour Y après chaque compétence

        // Competence Trois
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getCompetenceTrois()), 0, 'L');
        $y = $pdf->GetY();

        // Competence Quatre
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getCompetenceQuatre()), 0, 'L');
        $y = $pdf->GetY();

        // Competence Cinq
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getCompetenceCinq()), 0, 'L');
        $y = $pdf->GetY();

        // Competence Six
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getCompetencesix()), 0, 'L');

        // Expérience
        $pdf->SetFont('ubuntur', '', 12);

        // Position initiale pour la première expérience
        $initialY = 155;
        $pdf->SetXY(108, $initialY);

        // Utilisation de MultiCell pour la première expérience
        $pdf->MultiCell(75, 15, ucfirst($cv->getExperienceUne()), 0, 'L');
        $y = $pdf->GetY();  // Récupérer la position après la première expérience

        // Expérience Deux
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 15, ucfirst($cv->getExperienceDeux()), 0, 'L');
        $y = $pdf->GetY();  // Mettre à jour Y après la deuxième expérience

        // Expérience Trois
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 15, ucfirst($cv->getExperienceTrois()), 0, 'L');

        // Langues
        $pdf->SetFont('ubuntur', '', 12);

        // Position initiale pour la première langue
        $initialY = 232;
        $pdf->SetXY(108, $initialY);

        // Utilisation de MultiCell pour la première langue
        $pdf->MultiCell(75, 6, ucfirst($cv->getLangueUne()) . ' - ' . ucfirst($cv->getNiveauLangueUne()), 0, 'L');
        $y = $pdf->GetY();  // Récupérer la position après la première langue

        // Langue Deux
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getLangueDeux()) . ' - ' . ucfirst($cv->getNiveauLangueDeux()), 0, 'L');
        $y = $pdf->GetY();  // Mettre à jour Y après la deuxième langue

        // Langue Trois
        $pdf->SetXY(108, $y);
        $pdf->MultiCell(75, 6, ucfirst($cv->getLangueTrois()) . ' - ' . ucfirst($cv->getNiveauLangueTrois()), 0, 'L');

        // Formations
        $pdf->SetFont('ubuntur', '', 12);

        // Position initiale pour la première formation
        $initialY = 184;
        $pdf->SetXY(23, $initialY);

        // Utilisation de MultiCell avec une hauteur de ligne de 10 pour chaque formation
        $pdf->MultiCell(50, 15, ucfirst($cv->getFormationUne()), 0, 'L');
        $y = $pdf->GetY();  // Récupérer la position après la première formation

        // Formation Deux
        $pdf->SetXY(23, $y);
        $pdf->MultiCell(50, 15, ucfirst($cv->getFormationDeux()), 0, 'L');
        $y = $pdf->GetY();  // Mettre à jour Y après la deuxième formation

        // Formation Trois
        $pdf->SetXY(23, $y);
        $pdf->MultiCell(50, 15, ucfirst($cv->getFormationTrois()), 0, 'L');

        // Loisir
        $pdf->SetFont('ubuntur', '', 14);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(70, 266);
        // Afficher les loisirs sur une même ligne, séparés par des tirets
        $loisirs = ucfirst($cv->getLoisirUn()) . ' - ' . ucfirst($cv->getLoisirDeux()) . ' - ' . ucfirst($cv->getLoisirTrois()) . ' - ' . ucfirst($cv->getLoisirQuatre());
        $pdf->Write(0, $loisirs);



        // Ajouter l'image
        if ($photoFile) {
            $tempImage = $photoFile->getPathname();
            $pdf->Image($tempImage, 14, 40, 70, 70, '', '', '', false, 300, '', false, false, 0, 'CM', false, false);
        }

        $pdf->Output($fichierpdfcoller, 'F');
    }

    #[Route('/cv/download/immobilier/{id}', name: 'cv_download_immobilier')]
    public function downloadImmobilier(int $id): Response
    {
        $cv = $this->entityManager->getRepository(CvImmoUn::class)->find($id);

        if (!$cv) {
            throw $this->createNotFoundException('Le CV demandé n\'existe pas.');
        }

        // Chemin du fichier PDF généré pour le CV immobilier
        $pdfFilePath = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        return $this->render('cv/download.html.twig', [
            'cv' => $cv,
            'pdfFilePath' => '/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf' // Chemin pour le téléchargement
        ]);
    }
}
