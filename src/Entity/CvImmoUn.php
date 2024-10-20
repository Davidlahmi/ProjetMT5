<?php

namespace App\Entity;

use App\Repository\CvImmoUnRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvImmoUnRepository::class)]
class CvImmoUn
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $age = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $permis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photopersonne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FormationUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FormationDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FormationTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NomMetier = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceQuatre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceCinq = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Competencesix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ExperienceUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ExperienceDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ExperienceTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LangueUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NiveauLangueUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LangueDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NiveauLangueDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LangueTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $NiveauLangueTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LoisirUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LoisirDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LoisirTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LoisirQuatre = null;

    #[ORM\ManyToOne(inversedBy: 'cvImmoUns')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getPermis(): ?string
    {
        return $this->permis;
    }

    public function setPermis(?string $permis): static
    {
        $this->permis = $permis;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

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

    public function getFormationUne(): ?string
    {
        return $this->FormationUne;
    }

    public function setFormationUne(?string $FormationUne): static
    {
        $this->FormationUne = $FormationUne;

        return $this;
    }

    public function getFormationDeux(): ?string
    {
        return $this->FormationDeux;
    }

    public function setFormationDeux(?string $FormationDeux): static
    {
        $this->FormationDeux = $FormationDeux;

        return $this;
    }

    public function getFormationTrois(): ?string
    {
        return $this->FormationTrois;
    }

    public function setFormationTrois(?string $FormationTrois): static
    {
        $this->FormationTrois = $FormationTrois;

        return $this;
    }

    public function getNomMetier(): ?string
    {
        return $this->NomMetier;
    }

    public function setNomMetier(?string $NomMetier): static
    {
        $this->NomMetier = $NomMetier;

        return $this;
    }

    public function getCompetenceUne(): ?string
    {
        return $this->CompetenceUne;
    }

    public function setCompetenceUne(?string $CompetenceUne): static
    {
        $this->CompetenceUne = $CompetenceUne;

        return $this;
    }

    public function getCompetenceDeux(): ?string
    {
        return $this->CompetenceDeux;
    }

    public function setCompetenceDeux(?string $CompetenceDeux): static
    {
        $this->CompetenceDeux = $CompetenceDeux;

        return $this;
    }

    public function getCompetenceTrois(): ?string
    {
        return $this->CompetenceTrois;
    }

    public function setCompetenceTrois(?string $CompetenceTrois): static
    {
        $this->CompetenceTrois = $CompetenceTrois;

        return $this;
    }

    public function getCompetenceQuatre(): ?string
    {
        return $this->CompetenceQuatre;
    }

    public function setCompetenceQuatre(?string $CompetenceQuatre): static
    {
        $this->CompetenceQuatre = $CompetenceQuatre;

        return $this;
    }

    public function getCompetenceCinq(): ?string
    {
        return $this->CompetenceCinq;
    }

    public function setCompetenceCinq(?string $CompetenceCinq): static
    {
        $this->CompetenceCinq = $CompetenceCinq;

        return $this;
    }

    public function getCompetencesix(): ?string
    {
        return $this->Competencesix;
    }

    public function setCompetencesix(?string $Competencesix): static
    {
        $this->Competencesix = $Competencesix;

        return $this;
    }

    public function getExperienceUne(): ?string
    {
        return $this->ExperienceUne;
    }

    public function setExperienceUne(?string $ExperienceUne): static
    {
        $this->ExperienceUne = $ExperienceUne;

        return $this;
    }

    public function getExperienceDeux(): ?string
    {
        return $this->ExperienceDeux;
    }

    public function setExperienceDeux(?string $ExperienceDeux): static
    {
        $this->ExperienceDeux = $ExperienceDeux;

        return $this;
    }

    public function getExperienceTrois(): ?string
    {
        return $this->ExperienceTrois;
    }

    public function setExperienceTrois(?string $ExperienceTrois): static
    {
        $this->ExperienceTrois = $ExperienceTrois;

        return $this;
    }

    public function getLangueUne(): ?string
    {
        return $this->LangueUne;
    }

    public function setLangueUne(?string $LangueUne): static
    {
        $this->LangueUne = $LangueUne;

        return $this;
    }

    public function getNiveauLangueUne(): ?string
    {
        return $this->NiveauLangueUne;
    }

    public function setNiveauLangueUne(?string $NiveauLangueUne): static
    {
        $this->NiveauLangueUne = $NiveauLangueUne;

        return $this;
    }

    public function getLangueDeux(): ?string
    {
        return $this->LangueDeux;
    }

    public function setLangueDeux(?string $LangueDeux): static
    {
        $this->LangueDeux = $LangueDeux;

        return $this;
    }

    public function getNiveauLangueDeux(): ?string
    {
        return $this->NiveauLangueDeux;
    }

    public function setNiveauLangueDeux(?string $NiveauLangueDeux): static
    {
        $this->NiveauLangueDeux = $NiveauLangueDeux;

        return $this;
    }

    public function getLangueTrois(): ?string
    {
        return $this->LangueTrois;
    }

    public function setLangueTrois(?string $LangueTrois): static
    {
        $this->LangueTrois = $LangueTrois;

        return $this;
    }

    public function getNiveauLangueTrois(): ?string
    {
        return $this->NiveauLangueTrois;
    }

    public function setNiveauLangueTrois(?string $NiveauLangueTrois): static
    {
        $this->NiveauLangueTrois = $NiveauLangueTrois;

        return $this;
    }

    public function getLoisirUn(): ?string
    {
        return $this->LoisirUn;
    }

    public function setLoisirUn(?string $LoisirUn): static
    {
        $this->LoisirUn = $LoisirUn;

        return $this;
    }

    public function getLoisirDeux(): ?string
    {
        return $this->LoisirDeux;
    }

    public function setLoisirDeux(?string $LoisirDeux): static
    {
        $this->LoisirDeux = $LoisirDeux;

        return $this;
    }

    public function getLoisirTrois(): ?string
    {
        return $this->LoisirTrois;
    }

    public function setLoisirTrois(?string $LoisirTrois): static
    {
        $this->LoisirTrois = $LoisirTrois;

        return $this;
    }

    public function getLoisirQuatre(): ?string
    {
        return $this->LoisirQuatre;
    }

    public function setLoisirQuatre(?string $LoisirQuatre): static
    {
        $this->LoisirQuatre = $LoisirQuatre;

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
