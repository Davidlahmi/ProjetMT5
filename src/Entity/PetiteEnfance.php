<?php

namespace App\Entity;

use App\Repository\PetiteEnfanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PetiteEnfanceRepository::class)]
class PetiteEnfance
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

    #[ORM\Column(type: Types::TEXT)]
    private ?string $profil = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LangueUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $LangueDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceUne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $CompetenceQuatre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $liensite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $emaildeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $anneeetude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $diplomeUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DiplomeDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DiplomeTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomtravail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $travailUn = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $travailDeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $travailTrois = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomtravailledeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $anneetravailledeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptiontravailledeux = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $descriptiontravailletrois = null;

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

    public function getProfil(): ?string
    {
        return $this->profil;
    }

    public function setProfil(string $profil): static
    {
        $this->profil = $profil;

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

    public function getLangueDeux(): ?string
    {
        return $this->LangueDeux;
    }

    public function setLangueDeux(?string $LangueDeux): static
    {
        $this->LangueDeux = $LangueDeux;

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

    public function getLiensite(): ?string
    {
        return $this->liensite;
    }

    public function setLiensite(?string $liensite): static
    {
        $this->liensite = $liensite;

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

    public function getEmaildeux(): ?string
    {
        return $this->emaildeux;
    }

    public function setEmaildeux(?string $emaildeux): static
    {
        $this->emaildeux = $emaildeux;

        return $this;
    }

    public function getEtude(): ?string
    {
        return $this->etude;
    }

    public function setEtude(?string $etude): static
    {
        $this->etude = $etude;

        return $this;
    }

    public function getAnneeetude(): ?string
    {
        return $this->anneeetude;
    }

    public function setAnneeetude(?string $anneeetude): static
    {
        $this->anneeetude = $anneeetude;

        return $this;
    }

    public function getDiplomeUn(): ?string
    {
        return $this->diplomeUn;
    }

    public function setDiplomeUn(?string $diplomeUn): static
    {
        $this->diplomeUn = $diplomeUn;

        return $this;
    }

    public function getDiplomeDeux(): ?string
    {
        return $this->DiplomeDeux;
    }

    public function setDiplomeDeux(?string $DiplomeDeux): static
    {
        $this->DiplomeDeux = $DiplomeDeux;

        return $this;
    }

    public function getDiplomeTrois(): ?string
    {
        return $this->DiplomeTrois;
    }

    public function setDiplomeTrois(?string $DiplomeTrois): static
    {
        $this->DiplomeTrois = $DiplomeTrois;

        return $this;
    }

    public function getNomtravail(): ?string
    {
        return $this->nomtravail;
    }

    public function setNomtravail(?string $nomtravail): static
    {
        $this->nomtravail = $nomtravail;

        return $this;
    }

    public function getTravailUn(): ?string
    {
        return $this->travailUn;
    }

    public function setTravailUn(?string $travailUn): static
    {
        $this->travailUn = $travailUn;

        return $this;
    }

    public function getTravailDeux(): ?string
    {
        return $this->travailDeux;
    }

    public function setTravailDeux(?string $travailDeux): static
    {
        $this->travailDeux = $travailDeux;

        return $this;
    }

    public function getTravailTrois(): ?string
    {
        return $this->travailTrois;
    }

    public function setTravailTrois(?string $travailTrois): static
    {
        $this->travailTrois = $travailTrois;

        return $this;
    }

    public function getNomtravailledeux(): ?string
    {
        return $this->nomtravailledeux;
    }

    public function setNomtravailledeux(?string $nomtravailledeux): static
    {
        $this->nomtravailledeux = $nomtravailledeux;

        return $this;
    }

    public function getAnneetravailledeux(): ?string
    {
        return $this->anneetravailledeux;
    }

    public function setAnneetravailledeux(?string $anneetravailledeux): static
    {
        $this->anneetravailledeux = $anneetravailledeux;

        return $this;
    }

    public function getDescriptiontravailledeux(): ?string
    {
        return $this->descriptiontravailledeux;
    }

    public function setDescriptiontravailledeux(?string $descriptiontravailledeux): static
    {
        $this->descriptiontravailledeux = $descriptiontravailledeux;

        return $this;
    }

    public function getDescriptiontravailletrois(): ?string
    {
        return $this->descriptiontravailletrois;
    }

    public function setDescriptiontravailletrois(?string $descriptiontravailletrois): static
    {
        $this->descriptiontravailletrois = $descriptiontravailletrois;

        return $this;
    }
}
