<?php

namespace App\Controller;

use App\Entity\Cvteste;
use App\Entity\Mescv;
use App\Form\CvtesteType;
use Doctrine\ORM\EntityManagerInterface;
use setasign\Fpdi\Tcpdf\Fpdi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DeveloppeurController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/developpeur/{experience}', name: 'app_developpeur')]
    public function index(string $experience): Response
    {

        if ($experience === 'alternance') {
            return $this->render('developpeur/developpeur_cv/cv_alternance.html.twig');
        } elseif ($experience === 'FinEtude') {
            return $this->render('developpeur/developpeur_cv/cv_FinEtude.html.twig');
        } elseif ($experience === '0-10-ans') {
            return $this->render('developpeur/developpeur_cv/cv_0_10_ans.html.twig');
        } elseif ($experience === 'PlusDe10ans') {
            return $this->render('developpeur/developpeur_cv/cv_PlusDe10ans.html.twig');
        } elseif ($experience === 'TousCv') {
            return $this->render('developpeur/developpeur_cv/cv_tous.html.twig');
        }
    }

    #[Route('/cv4dev', name: 'app_teste')]
    public function indexx(Request $request): Response
    {
        $cv = new Cvteste();
        $form = $this->createForm(CvtesteType::class, $cv);
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
            $mescv->setTitle('CV ' . $cv->getNom());  // Modifier si nécessaire
            $mescv->setFilename($cv->getId() . '_CONVENTION.pdf');
            $mescv->setUser($user);
            $mescv->setCreatedAt(new \DateTimeImmutable());

            // Sauvegarder les données de Mescv
            $this->entityManager->persist($mescv);
            $this->entityManager->flush();

            // Générer le PDF avec l'image
            $this->createpdf($cv, $photoFile);

            // Rediriger vers la page de téléchargement après la création du CV
            return $this->redirectToRoute('cv_download', ['id' => $cv->getId()]);
        }

        return $this->render('developpeur/develeppeur_form/form_cv_4.html.twig', [
            'form' => $form->createView(),
            'cv' => $cv
        ]);
    }



    public function createpdf(Cvteste $cvteste, ?UploadedFile $photoFile = null) // Ajouter $photoFile en paramètre
    {

        $fichierpdfsource = $this->getParameter('kernel.project_dir') . '/public/assets/CvDevGen.pdf';
        $fichierpdfcoller = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cvteste->getId() . '_CONVENTION.pdf';

        $pdf = new Fpdi();
        $pdf->SetMargins(0, 0, 0); // Désactiver les marges
        $pdf->SetAutoPageBreak(false, 0); // Désactiver le saut automatique de page

        $pageCount = $pdf->setSourceFile($fichierpdfsource);

        for ($pageNo = 1; $pageNo <= 1; $pageNo++) {

            $pdf->AddPage();
            $tplIdx = $pdf->importPage($pageNo);
            $pdf->useTemplate($tplIdx);

            if ($pageNo == 1) {
                $pdf->SetFont('ubuntur', '', 12);
                $pdf->SetTextColor(255, 255, 255); // Texte blanc pour la section de gauche

                // Positionnement des données dans la colonne gauche du CV, encore plus à gauche
                $pdf->SetXY(9, 110); // Déplacement de la première ligne encore plus à gauche

                // Pays et Ville sur la même ligne avec un espacement encore réduit
                $pdf->Write(0, strtoupper($cvteste->getPays()) . ', ' . ucfirst(strtolower($cvteste->getVille())));

                // Positionnement de l'Email avec un espacement encore réduit
                $pdf->SetXY(9, 119);
                $pdf->Write(0, strtolower($cvteste->getEmail()));

                // Positionnement du Téléphone avec un espacement encore réduit
                $pdf->SetXY(9, 128);
                $pdf->Write(0, $cvteste->getTel());

                // Positionnement du Lien du Site avec un espacement encore réduit
                $pdf->SetXY(9, 137);
                $pdf->Write(0, strtolower($cvteste->getLiensite()));

                // Langues avec un espacement encore réduit
                $pdf->SetXY(9, 165);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getLangueune())) . ' - ' . ucfirst(strtolower($cvteste->getNivaulangueune())));

                $pdf->SetXY(9, 174);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getLanguedeux())) . ' - ' . ucfirst(strtolower($cvteste->getNiveaulanguedeux())));

                // Compétences avec un espacement encore réduit
                $pdf->SetXY(9, 205);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getCompetenceune())));

                $pdf->SetXY(9, 214);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getCompetencedeux())));

                $pdf->SetXY(9, 223);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getCompetencetrois())));

                // Centres d'intérêt avec un espacement encore réduit pour éviter la deuxième page
                $pdf->SetXY(9, 265); // Descente ajustée pour éviter que cela ne déborde
                $pdf->Write(0, ucfirst(strtolower($cvteste->getCdune())));

                $pdf->SetXY(9, 274);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getCddeux())));

                $pdf->SetXY(9, 283);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getCdtrois())));

                $pdf->SetFont('ubuntub', 'B', 30);
                $pdf->SetTextColor(0, 0, 0);
                $pdf->SetXY(113, 40);
                $pdf->Write(0, strtoupper($cvteste->getNom() . ' ' . ucfirst(strtolower($cvteste->getPrenom()))));

                // Nom du métier 1
                $pdf->SetXY(97, 97);
                $pdf->SetFont('ubuntub', 'B', 13);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getNomMetierUn())));

                // Position du métier 1
                $pdf->SetXY(97, 104);
                $pdf->SetFont('ubuntur', '', 9);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getPositionMetierUn())));

                // Commentaire 1 pour le métier 1
                $pdf->SetXY(97, 112);
                $pdf->SetFont('ubuntur', '', 9);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierUn())), 0, 'L', false);

                // Récupère la position Y après le premier commentaire
                $currentY = $pdf->GetY();

                // Commentaire 2 pour le métier 1
                $pdf->SetXY(97, $currentY + 2);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierDeux())), 0, 'L', false);

                // Récupère la position Y après le deuxième commentaire
                $currentY = $pdf->GetY();

                // Commentaire 3 pour le métier 1
                $pdf->SetXY(97, $currentY + 2);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierTrois())), 0, 'L', false);

                // Récupère la position Y après le troisième commentaire
                $currentY = $pdf->GetY();

                // Nom du métier 2
                $pdf->SetXY(97, 154); // Position de départ Y pour le deuxième métier
                $pdf->SetFont('ubuntub', 'B', 13);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getNomMetierDeux())));

                // Position du métier 2
                $pdf->SetXY(97, 161);
                $pdf->SetFont('ubuntur', '', 9);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getPositionMetierDeux())));

                // Commentaire 1 pour le métier 2
                $currentY = 169; // Position de départ pour les commentaires du métier 2
                $pdf->SetXY(97, $currentY);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierUnn())), 0, 'L', false);
                $currentY = $pdf->GetY() + 2; // Espacement réduit à 2

                // Commentaire 2 pour le métier 2
                $pdf->SetXY(97, $currentY);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierDeuxx())), 0, 'L', false);
                $currentY = $pdf->GetY() + 2;

                // Commentaire 3 pour le métier 2
                $pdf->SetXY(97, $currentY);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierTroiss())), 0, 'L', false);

                // Nom du métier 3
                $pdf->SetXY(97, 212); // Position de départ Y pour le troisième métier
                $pdf->SetFont('ubuntub', 'B', 13);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getNomMetierTrois())));

                // Position du métier 3
                $pdf->SetXY(97, 219);
                $pdf->SetFont('ubuntur', '', 9);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getPositionMetierTrois())));

                // Commentaire 1 pour le métier 3
                $currentY = 227;
                $pdf->SetXY(97, $currentY);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierUnnn())), 0, 'L', false);
                $currentY = $pdf->GetY() + 2;

                // Commentaire 2 pour le métier 3
                $pdf->SetXY(97, $currentY);
                $pdf->MultiCell(90, 5, ucfirst(strtolower($cvteste->getCommentaireMetierDeuxxx())), 0, 'L', false);

                // Nom de la formation
                $pdf->SetXY(97, 276); // Position Y pour la formation
                $pdf->SetFont('ubuntub', 'B', 13);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getNomFormation())));

                // Position de la formation
                $pdf->SetXY(97, 284);
                $pdf->SetFont('ubuntur', '', 9);
                $pdf->Write(0, ucfirst(strtolower($cvteste->getPositionFormation())));

                // Ajouter l'image dans le PDF avec des dimensions spécifiques
                if ($photoFile) {
                    $tempImage = $photoFile->getPathname();
                    $pdf->Image($tempImage, 29, 17, 65, 65, '', '', '', false, 300, '', false, false, 0, 'CM', false, false);
                }
            }
        }
        $pdf->Output($fichierpdfcoller, 'F');
    }

    #[Route('/cv/download/{id}', name: 'cv_download')]
    public function download(int $id): Response
    {
        $cv = $this->entityManager->getRepository(Cvteste::class)->find($id);

        if (!$cv) {
            throw $this->createNotFoundException('Le CV demandé n\'existe pas.');
        }

        // Chemin du fichier PDF généré
        $pdfFilePath = $this->getParameter('kernel.project_dir') . '/public/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf';

        return $this->render('cv/download.html.twig', [
            'cv' => $cv,
            'pdfFilePath' => '/assets/dossiereleves/' . $cv->getId() . '_CONVENTION.pdf' // Chemin pour le téléchargement
        ]);
    }
}
