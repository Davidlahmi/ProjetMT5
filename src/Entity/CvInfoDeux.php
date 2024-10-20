<?php

namespace App\Entity;

use App\Repository\CvInfoDeuxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvInfoDeuxRepository::class)]
class CvInfoDeux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profession = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photopersonne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $pays = null;

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
    private ?string $competenceune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $competencdeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $competencetrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $competencequatre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cdun = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cddeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cdtrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomMetierUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PossitionMetierUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierQuatre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomMetierDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PossitionMetierDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierUnn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierDeuxx = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierTroiss = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CommentaireMetierQuatree = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomFormationUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionFormationUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomFormationDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $PositionFormationDeux = null;

    #[ORM\ManyToOne(inversedBy: 'cvInfoDeuxes')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): static
    {
        $this->Nom = $Nom;

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

    public function getPhotopersonne(): ?string
    {
        return $this->photopersonne;
    }

    public function setPhotopersonne(?string $photopersonne): static
    {
        $this->photopersonne = $photopersonne;

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

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): static
    {
        $this->pays = $pays;

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

    public function getCompetenceune(): ?string
    {
        return $this->competenceune;
    }

    public function setCompetenceune(?string $competenceune): static
    {
        $this->competenceune = $competenceune;

        return $this;
    }

    public function getCompetencdeux(): ?string
    {
        return $this->competencdeux;
    }

    public function setCompetencdeux(?string $competencdeux): static
    {
        $this->competencdeux = $competencdeux;

        return $this;
    }

    public function getCompetencetrois(): ?string
    {
        return $this->competencetrois;
    }

    public function setCompetencetrois(?string $competencetrois): static
    {
        $this->competencetrois = $competencetrois;

        return $this;
    }

    public function getCompetencequatre(): ?string
    {
        return $this->competencequatre;
    }

    public function setCompetencequatre(?string $competencequatre): static
    {
        $this->competencequatre = $competencequatre;

        return $this;
    }

    public function getCdun(): ?string
    {
        return $this->cdun;
    }

    public function setCdun(?string $cdun): static
    {
        $this->cdun = $cdun;

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

    public function getPossitionMetierUn(): ?string
    {
        return $this->PossitionMetierUn;
    }

    public function setPossitionMetierUn(?string $PossitionMetierUn): static
    {
        $this->PossitionMetierUn = $PossitionMetierUn;

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

    public function getCommentaireMetierTrois(): ?string
    {
        return $this->CommentaireMetierTrois;
    }

    public function setCommentaireMetierTrois(?string $CommentaireMetierTrois): static
    {
        $this->CommentaireMetierTrois = $CommentaireMetierTrois;

        return $this;
    }

    public function getCommentaireMetierQuatre(): ?string
    {
        return $this->CommentaireMetierQuatre;
    }

    public function setCommentaireMetierQuatre(?string $CommentaireMetierQuatre): static
    {
        $this->CommentaireMetierQuatre = $CommentaireMetierQuatre;

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

    public function getPossitionMetierDeux(): ?string
    {
        return $this->PossitionMetierDeux;
    }

    public function setPossitionMetierDeux(?string $PossitionMetierDeux): static
    {
        $this->PossitionMetierDeux = $PossitionMetierDeux;

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

    public function getCommentaireMetierTroiss(): ?string
    {
        return $this->CommentaireMetierTroiss;
    }

    public function setCommentaireMetierTroiss(?string $CommentaireMetierTroiss): static
    {
        $this->CommentaireMetierTroiss = $CommentaireMetierTroiss;

        return $this;
    }

    public function getCommentaireMetierQuatree(): ?string
    {
        return $this->CommentaireMetierQuatree;
    }

    public function setCommentaireMetierQuatree(?string $CommentaireMetierQuatree): static
    {
        $this->CommentaireMetierQuatree = $CommentaireMetierQuatree;

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
