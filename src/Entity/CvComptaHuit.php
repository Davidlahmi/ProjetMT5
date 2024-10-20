<?php

namespace App\Entity;

use App\Repository\CvComptaHuitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvComptaHuitRepository::class)]
class CvComptaHuit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profession = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pays = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $liensite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $langueune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveaulangueune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $languedeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveaulanguedeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $certifune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $certifdeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cdune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cddeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cdtrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomMetierUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionMetierUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomMetierDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionMetierDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierUnn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierDeuxx = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomMetierTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionMetierTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierUnnn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierDeuxxx = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetiertroisss = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomFormationUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionFormationUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomFormationDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionFormationDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PhotoPersonne = null;

    #[ORM\ManyToOne(inversedBy: 'cvComptaHuits')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): static
    {
        $this->profession = $profession;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getLiensite(): ?string
    {
        return $this->liensite;
    }

    public function setLiensite(?string $liensite): static
    {
        $this->liensite = $liensite;

        return $this;
    }

    public function getLangueune(): ?string
    {
        return $this->langueune;
    }

    public function setLangueune(?string $langueune): static
    {
        $this->langueune = $langueune;

        return $this;
    }

    public function getNiveaulangueune(): ?string
    {
        return $this->niveaulangueune;
    }

    public function setNiveaulangueune(?string $niveaulangueune): static
    {
        $this->niveaulangueune = $niveaulangueune;

        return $this;
    }

    public function getLanguedeux(): ?string
    {
        return $this->languedeux;
    }

    public function setLanguedeux(?string $languedeux): static
    {
        $this->languedeux = $languedeux;

        return $this;
    }

    public function getNiveaulanguedeux(): ?string
    {
        return $this->niveaulanguedeux;
    }

    public function setNiveaulanguedeux(?string $niveaulanguedeux): static
    {
        $this->niveaulanguedeux = $niveaulanguedeux;

        return $this;
    }

    public function getCertifune(): ?string
    {
        return $this->certifune;
    }

    public function setCertifune(?string $certifune): static
    {
        $this->certifune = $certifune;

        return $this;
    }

    public function getCertifdeux(): ?string
    {
        return $this->certifdeux;
    }

    public function setCertifdeux(?string $certifdeux): static
    {
        $this->certifdeux = $certifdeux;

        return $this;
    }

    public function getCdune(): ?string
    {
        return $this->cdune;
    }

    public function setCdune(?string $cdune): static
    {
        $this->cdune = $cdune;

        return $this;
    }

    public function getCddeux(): ?string
    {
        return $this->cddeux;
    }

    public function setCddeux(?string $cddeux): static
    {
        $this->cddeux = $cddeux;

        return $this;
    }

    public function getCdtrois(): ?string
    {
        return $this->cdtrois;
    }

    public function setCdtrois(?string $cdtrois): static
    {
        $this->cdtrois = $cdtrois;

        return $this;
    }

    public function getNomMetierUn(): ?string
    {
        return $this->NomMetierUn;
    }

    public function setNomMetierUn(?string $NomMetierUn): static
    {
        $this->NomMetierUn = $NomMetierUn;

        return $this;
    }

    public function getPositionMetierUn(): ?string
    {
        return $this->PositionMetierUn;
    }

    public function setPositionMetierUn(?string $PositionMetierUn): static
    {
        $this->PositionMetierUn = $PositionMetierUn;

        return $this;
    }

    public function getCommentaireMetierUn(): ?string
    {
        return $this->CommentaireMetierUn;
    }

    public function setCommentaireMetierUn(?string $CommentaireMetierUn): static
    {
        $this->CommentaireMetierUn = $CommentaireMetierUn;

        return $this;
    }

    public function getCommentaireMetierDeux(): ?string
    {
        return $this->CommentaireMetierDeux;
    }

    public function setCommentaireMetierDeux(?string $CommentaireMetierDeux): static
    {
        $this->CommentaireMetierDeux = $CommentaireMetierDeux;

        return $this;
    }

    public function getNomMetierDeux(): ?string
    {
        return $this->NomMetierDeux;
    }

    public function setNomMetierDeux(?string $NomMetierDeux): static
    {
        $this->NomMetierDeux = $NomMetierDeux;

        return $this;
    }

    public function getPositionMetierDeux(): ?string
    {
        return $this->PositionMetierDeux;
    }

    public function setPositionMetierDeux(?string $PositionMetierDeux): static
    {
        $this->PositionMetierDeux = $PositionMetierDeux;

        return $this;
    }

    public function getCommentaireMetierUnn(): ?string
    {
        return $this->CommentaireMetierUnn;
    }

    public function setCommentaireMetierUnn(?string $CommentaireMetierUnn): static
    {
        $this->CommentaireMetierUnn = $CommentaireMetierUnn;

        return $this;
    }

    public function getCommentaireMetierDeuxx(): ?string
    {
        return $this->CommentaireMetierDeuxx;
    }

    public function setCommentaireMetierDeuxx(?string $CommentaireMetierDeuxx): static
    {
        $this->CommentaireMetierDeuxx = $CommentaireMetierDeuxx;

        return $this;
    }

    public function getNomMetierTrois(): ?string
    {
        return $this->NomMetierTrois;
    }

    public function setNomMetierTrois(?string $NomMetierTrois): static
    {
        $this->NomMetierTrois = $NomMetierTrois;

        return $this;
    }

    public function getPositionMetierTrois(): ?string
    {
        return $this->PositionMetierTrois;
    }

    public function setPositionMetierTrois(?string $PositionMetierTrois): static
    {
        $this->PositionMetierTrois = $PositionMetierTrois;

        return $this;
    }

    public function getCommentaireMetierUnnn(): ?string
    {
        return $this->CommentaireMetierUnnn;
    }

    public function setCommentaireMetierUnnn(?string $CommentaireMetierUnnn): static
    {
        $this->CommentaireMetierUnnn = $CommentaireMetierUnnn;

        return $this;
    }

    public function getCommentaireMetierDeuxxx(): ?string
    {
        return $this->CommentaireMetierDeuxxx;
    }

    public function setCommentaireMetierDeuxxx(?string $CommentaireMetierDeuxxx): static
    {
        $this->CommentaireMetierDeuxxx = $CommentaireMetierDeuxxx;

        return $this;
    }

    public function getCommentaireMetiertroisss(): ?string
    {
        return $this->CommentaireMetiertroisss;
    }

    public function setCommentaireMetiertroisss(?string $CommentaireMetiertroisss): static
    {
        $this->CommentaireMetiertroisss = $CommentaireMetiertroisss;

        return $this;
    }

    public function getNomFormationUne(): ?string
    {
        return $this->NomFormationUne;
    }

    public function setNomFormationUne(?string $NomFormationUne): static
    {
        $this->NomFormationUne = $NomFormationUne;

        return $this;
    }

    public function getPositionFormationUne(): ?string
    {
        return $this->PositionFormationUne;
    }

    public function setPositionFormationUne(?string $PositionFormationUne): static
    {
        $this->PositionFormationUne = $PositionFormationUne;

        return $this;
    }

    public function getNomFormationDeux(): ?string
    {
        return $this->NomFormationDeux;
    }

    public function setNomFormationDeux(?string $NomFormationDeux): static
    {
        $this->NomFormationDeux = $NomFormationDeux;

        return $this;
    }

    public function getPositionFormationDeux(): ?string
    {
        return $this->PositionFormationDeux;
    }

    public function setPositionFormationDeux(?string $PositionFormationDeux): static
    {
        $this->PositionFormationDeux = $PositionFormationDeux;

        return $this;
    }

    public function getPhotoPersonne(): ?string
    {
        return $this->PhotoPersonne;
    }

    public function setPhotoPersonne(?string $PhotoPersonne): static
    {
        $this->PhotoPersonne = $PhotoPersonne;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
