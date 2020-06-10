<?php

namespace App\Entity;

use App\Repository\SmartHomeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SmartHomeRepository::class)
 */
class SmartHome
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codeIdentification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=WiFi::class, mappedBy="smartHome", orphanRemoval=true)
     */
    private $wifis;

    /**
     * @ORM\OneToMany(targetEntity=Piece::class, mappedBy="smartHome", orphanRemoval=true)
     */
    private $pieces;

    /**
     * @ORM\ManyToOne(targetEntity=Proprietaire::class, inversedBy="smartHomes",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $proprietaire;

    /**
     * @ORM\ManyToMany(targetEntity=Habitant::class, inversedBy="smartHomes")
     */
    private $habitants;

    /**
     * @ORM\OneToOne(targetEntity=CompteurConsommationElectrique::class, cascade={"persist", "remove"})
     */
    private $compteurConsommationElectrique;

    /**
     * @ORM\OneToOne(targetEntity=CompteurConsommationThermique::class, cascade={"persist", "remove"})
     */
    private $compteurConsommationThermique;

    /**
     * @ORM\OneToOne(targetEntity=CentraleAlarme::class, mappedBy="smartHome", cascade={"persist", "remove"})
     */
    private $centraleAlarme;

    public function __construct()
    {
        $this->wifis = new ArrayCollection();
        $this->pieces = new ArrayCollection();
        $this->habitants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeIdentification(): ?int
    {
        return $this->codeIdentification;
    }

    public function setCodeIdentification(int $codeIdentification): self
    {
        $this->codeIdentification = $codeIdentification;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|WiFi[]
     */
    public function getWifis(): Collection
    {
        return $this->wifis;
    }

    public function addWifi(WiFi $wifi): self
    {
        if (!$this->wifis->contains($wifi)) {
            $this->wifis[] = $wifi;
            $wifi->setSmartHome($this);
        }

        return $this;
    }

    public function removeWifi(WiFi $wifi): self
    {
        if ($this->wifis->contains($wifi)) {
            $this->wifis->removeElement($wifi);
            // set the owning side to null (unless already changed)
            if ($wifi->getSmartHome() === $this) {
                $wifi->setSmartHome(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Piece[]
     */
    public function getPieces(): Collection
    {
        return $this->pieces;
    }

    public function addPiece(Piece $piece): self
    {
        if (!$this->pieces->contains($piece)) {
            $this->pieces[] = $piece;
            $piece->setSmartHome($this);
        }

        return $this;
    }

    public function removePiece(Piece $piece): self
    {
        if ($this->pieces->contains($piece)) {
            $this->pieces->removeElement($piece);
            // set the owning side to null (unless already changed)
            if ($piece->getSmartHome() === $this) {
                $piece->setSmartHome(null);
            }
        }

        return $this;
    }

    public function getProprietaire(): ?Proprietaire
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?Proprietaire $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * @return Collection|Habitant[]
     */
    public function getHabitants(): Collection
    {
        return $this->habitants;
    }

    public function addHabitant(Habitant $habitant): self
    {
        if (!$this->habitants->contains($habitant)) {
            $this->habitants[] = $habitant;
        }

        return $this;
    }

    public function removeHabitant(Habitant $habitant): self
    {
        if ($this->habitants->contains($habitant)) {
            $this->habitants->removeElement($habitant);
        }

        return $this;
    }

    public function getCompteurConsommationElectrique(): ?CompteurConsommationElectrique
    {
        return $this->compteurConsommationElectrique;
    }

    public function setCompteurConsommationElectrique(?CompteurConsommationElectrique $compteurConsommationElectrique): self
    {
        $this->compteurConsommationElectrique = $compteurConsommationElectrique;

        return $this;
    }

    public function getCompteurConsommationThermique(): ?CompteurConsommationThermique
    {
        return $this->compteurConsommationThermique;
    }

    public function setCompteurConsommationThermique(?CompteurConsommationThermique $compteurConsommationThermique): self
    {
        $this->compteurConsommationThermique = $compteurConsommationThermique;

        return $this;
    }

    public function getCentraleAlarme(): ?CentraleAlarme
    {
        return $this->centraleAlarme;
    }

    public function setCentraleAlarme(CentraleAlarme $centraleAlarme): self
    {
        $this->centraleAlarme = $centraleAlarme;

        // set the owning side of the relation if necessary
        if ($centraleAlarme->getSmartHome() !== $this) {
            $centraleAlarme->setSmartHome($this);
        }

        return $this;
    }
}
