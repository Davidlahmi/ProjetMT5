<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\OneToMany(targetEntity: Mescv::class, mappedBy: 'user')]
    private Collection $mescvs;

    #[ORM\OneToMany(targetEntity: Cvteste::class, mappedBy: 'user')]
    private Collection $cvtestes;

    #[ORM\OneToMany(targetEntity: CvComptaHuit::class, mappedBy: 'user')]
    private Collection $cvComptaHuits;

    #[ORM\OneToMany(targetEntity: CvImmoUn::class, mappedBy: 'user')]
    private Collection $cvImmoUns;

    #[ORM\OneToMany(targetEntity: CvInfoDeux::class, mappedBy: 'user')]
    private Collection $cvInfoDeuxes;

    public function __construct()
    {
        $this->mescvs = new ArrayCollection();
        $this->cvtestes = new ArrayCollection();
        $this->cvComptaHuits = new ArrayCollection();
        $this->cvImmoUns = new ArrayCollection();
        $this->cvInfoDeuxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection<int, Mescv>
     */
    public function getMescvs(): Collection
    {
        return $this->mescvs;
    }

    public function addMescv(Mescv $mescv): static
    {
        if (!$this->mescvs->contains($mescv)) {
            $this->mescvs->add($mescv);
            $mescv->setUser($this);
        }

        return $this;
    }

    public function removeMescv(Mescv $mescv): static
    {
        if ($this->mescvs->removeElement($mescv)) {
            // set the owning side to null (unless already changed)
            if ($mescv->getUser() === $this) {
                $mescv->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cvteste>
     */
    public function getCvtestes(): Collection
    {
        return $this->cvtestes;
    }

    public function addCvtestis(Cvteste $cvtestis): static
    {
        if (!$this->cvtestes->contains($cvtestis)) {
            $this->cvtestes->add($cvtestis);
            $cvtestis->setUser($this);
        }

        return $this;
    }

    public function removeCvtestis(Cvteste $cvtestis): static
    {
        if ($this->cvtestes->removeElement($cvtestis)) {
            // set the owning side to null (unless already changed)
            if ($cvtestis->getUser() === $this) {
                $cvtestis->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CvComptaHuit>
     */
    public function getCvComptaHuits(): Collection
    {
        return $this->cvComptaHuits;
    }

    public function addCvComptaHuit(CvComptaHuit $cvComptaHuit): static
    {
        if (!$this->cvComptaHuits->contains($cvComptaHuit)) {
            $this->cvComptaHuits->add($cvComptaHuit);
            $cvComptaHuit->setUser($this);
        }

        return $this;
    }

    public function removeCvComptaHuit(CvComptaHuit $cvComptaHuit): static
    {
        if ($this->cvComptaHuits->removeElement($cvComptaHuit)) {
            // set the owning side to null (unless already changed)
            if ($cvComptaHuit->getUser() === $this) {
                $cvComptaHuit->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CvImmoUn>
     */
    public function getCvImmoUns(): Collection
    {
        return $this->cvImmoUns;
    }

    public function addCvImmoUn(CvImmoUn $cvImmoUn): static
    {
        if (!$this->cvImmoUns->contains($cvImmoUn)) {
            $this->cvImmoUns->add($cvImmoUn);
            $cvImmoUn->setUser($this);
        }

        return $this;
    }

    public function removeCvImmoUn(CvImmoUn $cvImmoUn): static
    {
        if ($this->cvImmoUns->removeElement($cvImmoUn)) {
            // set the owning side to null (unless already changed)
            if ($cvImmoUn->getUser() === $this) {
                $cvImmoUn->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CvInfoDeux>
     */
    public function getCvInfoDeuxes(): Collection
    {
        return $this->cvInfoDeuxes;
    }

    public function addCvInfoDeux(CvInfoDeux $cvInfoDeux): static
    {
        if (!$this->cvInfoDeuxes->contains($cvInfoDeux)) {
            $this->cvInfoDeuxes->add($cvInfoDeux);
            $cvInfoDeux->setUser($this);
        }

        return $this;
    }

    public function removeCvInfoDeux(CvInfoDeux $cvInfoDeux): static
    {
        if ($this->cvInfoDeuxes->removeElement($cvInfoDeux)) {
            // set the owning side to null (unless already changed)
            if ($cvInfoDeux->getUser() === $this) {
                $cvInfoDeux->setUser(null);
            }
        }

        return $this;
    }
}
