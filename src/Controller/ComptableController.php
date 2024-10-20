<?php

namespace App\Controller;

use App\Entity\CvComptaHuit;
use App\Entity\Mescv;
use App\Form\CvComptableHuitType;
use Doctrine\ORM\EntityManagerInterface;
use setasign\Fpdi\Tcpdf\Fpdi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComptableController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/comptable/{experience}', name: 'app_comptable')]
    public function index(string $experience): Response
    {
        if ($experience === 'alternance') {
            return $this->render('comptable/comptable_cv/cv_alternance.html.twig');
        } elseif ($experience === 'FinEtude') {
            return $this->render('comptable/comptable_cv/cv_FinEtude.html.twig');
        } elseif ($experience === '0-10-ans') {
            return $this->render('comptable/comptable_cv/cv_0_10_ans.html.twig');
        } elseif ($experience === 'PlusDe10ans') {
            return $this->render('comptable/comptable_cv/cv_PlusDe10ans.html.twig');
        } elseif ($experience === 'TousCv') {
            return $this->render('comptable/comptable_cv/cv_tous.html.twig');
        }
    }

    #[Route('/cv8comptable', name: 'app_compta_huit')]
    public function indexx(Request $request): Response
    {
        $cv = new CvComptaHuit();
        $form = $this->createForm(CvComptableHuitType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $photoFile */
            $photoFile = $form->get('PhotoPersonne')->getData();

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
            $mescv->setTitle('CV Comptable ' . $cv->getNom());  // Modifier si nécessaire
            $mescv->setFilename($cv->getId() . '_CONVENTION.pdf');
            $mescv->setUser($user);
            $mescv->setCreatedAt(new \DateTimeImmutable());

            // Sauvegarder les données de Mescv
            $this->entityManager->persist($mescv);
            $this->entityManager->flush();

            // Générer le PDF avec l'image
            $this->createpdf($cv, $photoFile);

            // Rediriger vers la page de téléchargement après la création du CV
            return $this->redirectToRoute('cv_download_compta', ['id' => $cv->getId()]);
        }

        return $this->render('comptable/comptable_form/form_cv_8.html.twig', [
            'form' => $form->createView(),
            'cv' => $cv
        ]);
    }




    public function createpdf(CvComptaHuit $cv, ?UploadedFile $photoFile = null)
    {
        $fichierpdfsource = $this->getParameter('kernel.project_dir') . '/public/assets/CvComptaGen.pdf';
        $fichierpdfcoller = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        $pdf = new Fpdi();
        $pdf->SetMargins(0, 0, 0);
        $pdf->SetAutoPageBreak(false, 0);

        $pageCount = $pdf->setSourceFile($fichierpdfsource);
        $pdf->AddPage();
        $tplIdx = $pdf->importPage(1);
        $pdf->useTemplate($tplIdx);

        // Nom, Prénom et Profession en haut à droite, en blanc et plus grand
        $pdf->SetFont('ubuntub', 'B', 60); // Nom et prénom en gras
        $pdf->SetTextColor(255, 255, 255);
        $pdf->SetXY(91, 20);
        $pdf->Write(0, strtoupper($cv->getNom()));

        $pdf->SetXY(91, 40);
        $pdf->Write(0, ucfirst(strtolower($cv->getPrenom())));

        $pdf->SetFont('ubuntur', '', 18); // Profession en blanc et non gras
        $pdf->SetXY(93, 65);
        $pdf->Write(0, ucfirst(strtolower($cv->getProfession())));

        // Coordonnées
        $pdf->SetFont('ubuntur', '', 12);
        $pdf->SetTextColor(0, 0, 0); // Texte noir
        $pdf->SetXY(21, 100);
        $pdf->Write(0, ucfirst(strtolower($cv->getPays())) . ', ' . ucfirst(strtolower($cv->getVille())));

        $pdf->SetXY(21, 109);
        $pdf->Write(0, strtolower($cv->getEmail()));

        $pdf->SetXY(21, 118);
        $pdf->Write(0, $cv->getTelephone());

        $pdf->SetXY(21, 127);
        $pdf->Write(0, strtolower($cv->getLiensite()));

        // Langues
        $pdf->SetXY(21, 152);
        $pdf->Write(0, ucfirst(strtolower($cv->getLangueune())) . ' - ' . ucfirst(strtolower($cv->getNiveaulangueune())));

        $pdf->SetXY(21, 162);
        $pdf->Write(0, ucfirst(strtolower($cv->getLanguedeux())) . ' - ' . ucfirst(strtolower($cv->getNiveaulanguedeux())));

        // Certifications avec MultiCell pour éviter le débordement
        $pdf->SetXY(21, 202);
        $pdf->MultiCell(50, 5, ucfirst(strtolower($cv->getCertifune())), 0, 'L');
        $currentY = $pdf->GetY() + 5;
        $pdf->SetXY(21, $currentY);
        $pdf->MultiCell(50, 5, ucfirst(strtolower($cv->getCertifdeux())), 0, 'L');

        // Centres d'intérêt
        $pdf->SetXY(21, 249);
        $pdf->Write(0, ucfirst(strtolower($cv->getCdune())));

        $pdf->SetXY(21, 258);
        $pdf->Write(0, ucfirst(strtolower($cv->getCddeux())));

        $pdf->SetXY(21, 267);
        $pdf->Write(0, ucfirst(strtolower($cv->getCdtrois())));








        // Expériences professionnelles avec les titres en bleu, taille légèrement réduite pour le texte
        $pdf->SetFont('ubuntur', '', 16); // Taille réduite de 1
        $pdf->SetTextColor(0, 51, 102); // Texte bleu pour les titres

        // Première expérience
        $pdf->SetXY(93, 102);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomMetierUn())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5); // Taille de 11.5 pour le texte normal
        $pdf->SetXY(93, 111);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionMetierUn())));

        // Commentaires dynamiques pour la première expérience
        $pdf->SetXY(93, 120);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierUn())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(93, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierDeux())), 0, 'L');










        // Deuxième expérience avec positions fixes pour titre et position
        $pdf->SetFont('ubuntur', '', 16);
        $pdf->SetTextColor(0, 51, 102);
        $pdf->SetXY(93, 145);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomMetierDeux())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5);
        $pdf->SetXY(93, 154);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionMetierDeux())));

        // Commentaires dynamiques pour la deuxième expérience
        $pdf->SetXY(93, 162);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierUnn())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(93, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierDeuxx())), 0, 'L');

        // Troisième expérience avec positions fixes pour titre et position
        $pdf->SetFont('ubuntur', '', 16);
        $pdf->SetTextColor(0, 51, 102);
        $pdf->SetXY(93, 188);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomMetierTrois())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5);
        $pdf->SetXY(93, 196);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionMetierTrois())));

        // Commentaires dynamiques pour la troisième expérience
        $pdf->SetXY(93, 206);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierUnnn())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(93, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetierDeuxxx())), 0, 'L');
        $currentY = $pdf->GetY() + 2;
        $pdf->SetXY(93, $currentY);
        $pdf->MultiCell(100, 5, ucfirst(strtolower($cv->getCommentaireMetiertroisss())), 0, 'L');

        // Formations avec titres en bleu et augmentés, en utilisant des positions fixes pour les titres et positions
        $pdf->SetFont('ubuntur', '', 13);
        $pdf->SetTextColor(0, 51, 102);
        $pdf->SetXY(93, 245);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomFormationUne())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5);
        $pdf->SetXY(93, 252);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionFormationUne())));

        $pdf->SetFont('ubuntur', '', 13);
        $pdf->SetTextColor(0, 51, 102);
        $pdf->SetXY(93, 262);
        $pdf->Write(0, ucfirst(strtolower($cv->getNomFormationDeux())));
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('ubuntur', '', 11.5);
        $pdf->SetXY(93, 269);
        $pdf->Write(0, ucfirst(strtolower($cv->getPositionFormationDeux())));

        // Ajouter l'image dans le PDF
        if ($photoFile) {
            $tempImage = $photoFile->getPathname();
            $pdf->Image($tempImage, 14, 17, 65, 65, '', '', '', false, 300, '', false, false, 0, 'CM', false, false);
        }

        $pdf->Output($fichierpdfcoller, 'F');
    }





    #[Route('/cv/download/compta/{id}', name: 'cv_download_compta')]
    public function downloadCompta(int $id): Response
    {
        $cv = $this->entityManager->getRepository(CvComptaHuit::class)->find($id);

        if (!$cv) {
            throw $this->createNotFoundException('Le CV demandé n\'existe pas.');
        }

        // Chemin du fichier PDF généré pour le CV comptable
        $pdfFilePath = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        return $this->render('cv/download.html.twig', [
            'cv' => $cv,
            'pdfFilePath' => '/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf' // Chemin pour le téléchargement
        ]);
    }
}
