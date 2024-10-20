<?php

namespace App\Controller;

use App\Entity\CvInfoDeux;
use App\Entity\Mescv;
use App\Form\CvInfoDeuxType;
use Doctrine\ORM\EntityManagerInterface;
use setasign\Fpdi\Tcpdf\Fpdi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformaticienController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/informaticien/{experience}', name: 'app_informaticien')]
    public function index(string $experience): Response
    {
        if ($experience === 'alternance') {
            return $this->render('informaticien/informaticien_cv/cv_alternance.html.twig');
        } elseif ($experience === 'FinEtude') {
            return $this->render('informaticien/informaticien_cv/cv_FinEtude.html.twig');
        } elseif ($experience === '0-10-ans') {
            return $this->render('informaticien/informaticien_cv/cv_0_10_ans.html.twig');
        } elseif ($experience === 'PlusDe10ans') {
            return $this->render('informaticien/informaticien_cv/cv_PlusDe10ans.html.twig');
        } elseif ($experience === 'TousCv') {
            return $this->render('informaticien/informaticien_cv/cv_tous.html.twig');
        }
    }

    #[Route('/cv2informaticien', name: 'app_informaticien_form')]
    public function indexx(Request $request): Response
    {
        $cv = new CvInfoDeux();
        $form = $this->createForm(CvInfoDeuxType::class, $cv);
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
            $mescv->setTitle('CV Informaticien ' . $cv->getNom());  // Modifier si nécessaire
            $mescv->setFilename($cv->getId() . '_CONVENTION.pdf');
            $mescv->setUser($user);
            $mescv->setCreatedAt(new \DateTimeImmutable());

            // Sauvegarder les données de Mescv
            $this->entityManager->persist($mescv);
            $this->entityManager->flush();

            // Générer le PDF avec l'image
            $this->createpdf($cv, $photoFile);

            // Rediriger vers la page de téléchargement après la création du CV
            return $this->redirectToRoute('cv_download_informaticien', ['id' => $cv->getId()]);
        }

        return $this->render('informaticien/informaticien_form/form_cv_2.html.twig', [
            'form' => $form->createView(),
            'cv' => $cv
        ]);
    }


    public function createpdf(CvInfoDeux $cv, UploadedFile $photoFile = null)
    {
        $fichierpdfsource = $this->getParameter('kernel.project_dir') . '/public/assets/CvInfoGen.pdf';
        $fichierpdfcoller = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        $pdf = new Fpdi();
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(false, 0);

        $pageCount = $pdf->setSourceFile($fichierpdfsource);
        $pdf->AddPage();
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);

        // Nom, Prénom et Profession
        $pdf->SetFont('ubuntub', 'B', 65);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(93, 25);
        $pdf->Write(0, strtoupper($cv->getNom()));

        $pdf->SetXY(93, 45);
        $pdf->Write(0, ucfirst(strtolower($cv->getPrenom())));

        $pdf->SetFont('ubuntur', '', 20);
        $pdf->SetXY(95, 70);
        $pdf->Write(0, ucfirst(strtolower($cv->getProfession())));

        // Coordonnées
        $pdf->SetFont('ubuntur', '', 12);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(13, 110);
        $pdf->Write(0, ucfirst(strtolower($cv->getPays())) . ', ' . ucfirst(strtolower($cv->getVille())));

        $pdf->SetXY(13, 119);
        $pdf->Write(0, strtolower($cv->getEmail()));

        $pdf->SetXY(13, 128);
        $pdf->Write(0, $cv->getTelephone());

        $pdf->SetXY(13, 137);
        $pdf->Write(0, strtolower($cv->getLiensite()));

        // Langues
        $pdf->SetXY(13, 156);
        $pdf->Write(0, ucfirst(strtolower($cv->getLangueune())) . ' - ' . ucfirst(strtolower($cv->getNiveaulangueune())));

        $pdf->SetXY(13, 164);
        $pdf->Write(0, ucfirst(strtolower($cv->getLanguedeux())) . ' - ' . ucfirst(strtolower($cv->getNiveaulanguedeux())));

        // Compétences
        $pdf->SetXY(13, 187);
        $pdf->MultiCell(50, 5, ucfirst(strtolower($cv->getCompetenceune())), 0, 'L');
        $currentY = $pdf->GetY() + 3;
        $pdf->SetXY(13, $currentY);
        $pdf->MultiCell(50, 5, ucfirst(strtolower($cv->getcompetencdeux())), 0, 'L');
        $currentY = $pdf->GetY() + 3;
        $pdf->SetXY(13, $currentY);
        $pdf->MultiCell(50, 5, ucfirst(strtolower($cv->getCompetencetrois())), 0, 'L');
        $currentY = $pdf->GetY() + 3;
        $pdf->SetXY(13, $currentY);
        $pdf->MultiCell(50, 5, ucfirst(strtolower($cv->getCompetencequatre())), 0, 'L');

        // Centres d'intérêt
        $pdf->SetXY(13, 259);
        $pdf->Write(0, ucfirst(strtolower($cv->getCdun())));

        $pdf->SetXY(13, 268);
        $pdf->Write(0, ucfirst(strtolower($cv->getCddeux())));

        $pdf->SetXY(13, 277);
        $pdf->Write(0, ucfirst(strtolower($cv->getCdtrois())));

        // Expériences professionnelles - première expérience
        $pdf->SetFont('ubuntur', 'B', 15);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(98, 109);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomMetierUn())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 10);
        $pdf->SetXY(98, 117);
        $pdf->Write(0, ucfirst(strtolower($cv->getPossitionMetierUn())));

        $pdf->SetXY(98, 124);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierUn())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(98, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierDeux())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(98, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierTrois())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(98, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierQuatre())), 0, 'L');

        // Expériences professionnelles - deuxième expérience
        $pdf->SetFont('ubuntur', 'B', 15);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(98, 173);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomMetierDeux())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 10);
        $pdf->SetXY(98, 181);
        $pdf->Write(0, ucfirst(strtolower($cv->getPossitionMetierDeux())));

        $pdf->SetXY(98, 189);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierUnn())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(98, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierDeuxx())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(98, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierTroiss())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(98, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierQuatree())), 0, 'L');

        // Formations
        $pdf->SetFont('ubuntur', 'B', 13);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(98, 252);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomFormationUne())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5);
        $pdf->SetXY(98, 259);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionFormationUne())));

        $pdf->SetFont('ubuntur', 'B', 13);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetXY(98, 270);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomFormationDeux())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5);
        $pdf->SetXY(98, 277);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionFormationDeux())));

        // Ajouter l'image dans le PDF
        if ($photoFile) {
            $tempImage = $photoFile->getPathname();
            $pdf->Image($tempImage, 2, 15, 80, 80, '', '', '', false, 300, '', false, false, 0, 'CM', false, false);
        }

        $pdf->Output($fichierpdfcoller, 'F');
    }


    #[Route('/cv/download/informaticien/{id}', name: 'cv_download_informaticien')]
    public function downloadCompta(int $id): Response
    {
        $cv = $this->entityManager->getRepository(CvInfoDeux::class)->find($id);

        if (!$cv) {
            throw $this->createNotFoundException('Le CV demandé n\'existe pas.');
        }

        $pdfFilePath = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        return $this->render('cv/download.html.twig', [
            'cv' => $cv,
            'pdfFilePath' => '/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf'
        ]);
    }
}
