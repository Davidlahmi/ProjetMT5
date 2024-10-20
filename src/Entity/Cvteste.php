<?php

namespace App\Entity;

use App\Entity\User;
use App\Repository\CvtesteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvtesteRepository::class)]
class Cvteste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\Column(length: 255)]
    private ?string $Ville = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $liensite = null;

    #[ORM\Column(length: 255)]
    private ?string $langueune = null;

    #[ORM\Column(length: 255)]
    private ?string $nivaulangueune = null;

    #[ORM\Column(length: 255)]
    private ?string $languedeux = null;

    #[ORM\Column(length: 255)]
    private ?string $niveaulanguedeux = null;

    #[ORM\Column(length: 255)]
    private ?string $competenceune = null;

    #[ORM\Column(length: 255)]
    private ?string $competencedeux = null;

    #[ORM\Column(length: 255)]
    private ?string $competencetrois = null;

    #[ORM\Column(length: 255)]
    private ?string $cdune = null;

    #[ORM\Column(length: 255)]
    private ?string $cddeux = null;

    #[ORM\Column(length: 255)]
    private ?string $cdtrois = null;

    #[ORM\Column(length: 255)]
    private ?string $NomMetierUn = null;

    #[ORM\Column(length: 255)]
    private ?string $PositionMetierUn = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierUn = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierDeux = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierTrois = null;

    #[ORM\Column(length: 255)]
    private ?string $NomMetierDeux = null;

    #[ORM\Column(length: 255)]
    private ?string $PositionMetierDeux = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierUnn = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierDeuxx = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierTroiss = null;

    #[ORM\Column(length: 255)]
    private ?string $NomMetierTrois = null;

    #[ORM\Column(length: 255)]
    private ?string $PositionMetierTrois = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierUnnn = null;

    #[ORM\Column(length: 255)]
    private ?string $CommentaireMetierDeuxxx = null;

    #[ORM\Column(length: 255)]
    private ?string $NomFormation = null;

    #[ORM\Column(length: 255)]
    private ?string $PositionFormation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PhotoPersonne = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $pdfPath;

    #[ORM\ManyToOne(inversedBy: 'cvtestes')]
    private ?user $user = null;

    public function getPdfPath(): ?string
    {
        return $this->pdfPath;
    }

    public function setPdfPath(string $pdfPath): self
    {
        $this->pdfPath = $pdfPath;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->Ville;
    }

    public function setVille(string $Ville): static
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getLiensite(): ?string
    {
        return $this->liensite;
    }

    public function setLiensite(string $liensite): static
    {
        $this->liensite = $liensite;

        return $this;
    }

    public function getLangueune(): ?string
    {
        return $this->langueune;
    }

    public function setLangueune(string $langueune): static
    {
        $this->langueune = $langueune;

        return $this;
    }

    public function getNivaulangueune(): ?string
    {
        return $this->nivaulangueune;
    }

    public function setNivaulangueune(string $nivaulangueune): static
    {
        $this->nivaulangueune = $nivaulangueune;

        return $this;
    }

    public function getLanguedeux(): ?string
    {
        return $this->languedeux;
    }

    public function setLanguedeux(string $languedeux): static
    {
        $this->languedeux = $languedeux;

        return $this;
    }

    public function getNiveaulanguedeux(): ?string
    {
        return $this->niveaulanguedeux;
    }

    public function setNiveaulanguedeux(string $niveaulanguedeux): static
    {
        $this->niveaulanguedeux = $niveaulanguedeux;

        return $this;
    }

    public function getCompetenceune(): ?string
    {
        return $this->competenceune;
    }

    public function setCompetenceune(string $competenceune): static
    {
        $this->competenceune = $competenceune;

        return $this;
    }

    public function getCompetencedeux(): ?string
    {
        return $this->competencedeux;
    }

    public function setCompetencedeux(string $competencedeux): static
    {
        $this->competencedeux = $competencedeux;

        return $this;
    }

    public function getCompetencetrois(): ?string
    {
        return $this->competencetrois;
    }

    public function setCompetencetrois(string $competencetrois): static
    {
        $this->competencetrois = $competencetrois;

        return $this;
    }

    public function getCdune(): ?string
    {
        return $this->cdune;
    }

    public function setCdune(string $cdune): static
    {
        $this->cdune = $cdune;

        return $this;
    }

    public function getCddeux(): ?string
    {
        return $this->cddeux;
    }

    public function setCddeux(string $cddeux): static
    {
        $this->cddeux = $cddeux;

        return $this;
    }

    public function getCdtrois(): ?string
    {
        return $this->cdtrois;
    }

    public function setCdtrois(string $cdtrois): static
    {
        $this->cdtrois = $cdtrois;

        return $this;
    }

    public function getNomMetierUn(): ?string
    {
        return $this->NomMetierUn;
    }

    public function setNomMetierUn(string $NomMetierUn): static
    {
        $this->NomMetierUn = $NomMetierUn;

        return $this;
    }

    public function getPositionMetierUn(): ?string
    {
        return $this->PositionMetierUn;
    }

    public function setPositionMetierUn(string $PositionMetierUn): static
    {
        $this->PositionMetierUn = $PositionMetierUn;

        return $this;
    }

    public function getCommentaireMetierUn(): ?string
    {
        return $this->CommentaireMetierUn;
    }

    public function setCommentaireMetierUn(string $CommentaireMetierUn): static
    {
        $this->CommentaireMetierUn = $CommentaireMetierUn;

        return $this;
    }

    public function getCommentaireMetierDeux(): ?string
    {
        return $this->CommentaireMetierDeux;
    }

    public function setCommentaireMetierDeux(string $CommentaireMetierDeux): static
    {
        $this->CommentaireMetierDeux = $CommentaireMetierDeux;

        return $this;
    }

    public function getCommentaireMetierTrois(): ?string
    {
        return $this->CommentaireMetierTrois;
    }

    public function setCommentaireMetierTrois(string $CommentaireMetierTrois): static
    {
        $this->CommentaireMetierTrois = $CommentaireMetierTrois;

        return $this;
    }

    public function getNomMetierDeux(): ?string
    {
        return $this->NomMetierDeux;
    }

    public function setNomMetierDeux(string $NomMetierDeux): static
    {
        $this->NomMetierDeux = $NomMetierDeux;

        return $this;
    }

    public function getPositionMetierDeux(): ?string
    {
        return $this->PositionMetierDeux;
    }

    public function setPositionMetierDeux(string $PositionMetierDeux): static
    {
        $this->PositionMetierDeux = $PositionMetierDeux;

        return $this;
    }

    public function getCommentaireMetierUnn(): ?string
    {
        return $this->CommentaireMetierUnn;
    }

    public function setCommentaireMetierUnn(string $CommentaireMetierUnn): static
    {
        $this->CommentaireMetierUnn = $CommentaireMetierUnn;

        return $this;
    }

    public function getCommentaireMetierDeuxx(): ?string
    {
        return $this->CommentaireMetierDeuxx;
    }

    public function setCommentaireMetierDeuxx(string $CommentaireMetierDeuxx): static
    {
        $this->CommentaireMetierDeuxx = $CommentaireMetierDeuxx;

        return $this;
    }

    public function getCommentaireMetierTroiss(): ?string
    {
        return $this->CommentaireMetierTroiss;
    }

    public function setCommentaireMetierTroiss(string $CommentaireMetierTroiss): static
    {
        $this->CommentaireMetierTroiss = $CommentaireMetierTroiss;

        return $this;
    }

    public function getNomMetierTrois(): ?string
    {
        return $this->NomMetierTrois;
    }

    public function setNomMetierTrois(string $NomMetierTrois): static
    {
        $this->NomMetierTrois = $NomMetierTrois;

        return $this;
    }

    public function getPositionMetierTrois(): ?string
    {
        return $this->PositionMetierTrois;
    }

    public function setPositionMetierTrois(string $PositionMetierTrois): static
    {
        $this->PositionMetierTrois = $PositionMetierTrois;

        return $this;
    }

    public function getCommentaireMetierUnnn(): ?string
    {
        return $this->CommentaireMetierUnnn;
    }

    public function setCommentaireMetierUnnn(string $CommentaireMetierUnnn): static
    {
        $this->CommentaireMetierUnnn = $CommentaireMetierUnnn;

        return $this;
    }

    public function getCommentaireMetierDeuxxx(): ?string
    {
        return $this->CommentaireMetierDeuxxx;
    }

    public function setCommentaireMetierDeuxxx(string $CommentaireMetierDeuxxx): static
    {
        $this->CommentaireMetierDeuxxx = $CommentaireMetierDeuxxx;

        return $this;
    }

    public function getNomFormation(): ?string
    {
        return $this->NomFormation;
    }

    public function setNomFormation(string $NomFormation): static
    {
        $this->NomFormation = $NomFormation;

        return $this;
    }

    public function getPositionFormation(): ?string
    {
        return $this->PositionFormation;
    }

    public function setPositionFormation(string $PositionFormation): static
    {
        $this->PositionFormation = $PositionFormation;

        return $this;
    }

    public function getPhotoPersonne(): ?string
    {
        return $this->PhotoPersonne;
    }

    public function setPhotoPersonne(string $PhotoPersonne): static
    {
        $this->PhotoPersonne = $PhotoPersonne;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): static
    {
        $this->user = $user;

        return $this;
    }
}
