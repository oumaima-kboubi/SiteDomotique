<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PieceRepository::class)
 */
class Piece
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=SmartHome::class, inversedBy="pieces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $smartHome;

    /**
     * @ORM\OneToMany(targetEntity=Capteur::class, mappedBy="piece")
     */
    private $capteurs;

    /**
     * @ORM\OneToMany(targetEntity=Lampe::class, mappedBy="piece")
     */
    private $lampes;

    /**
     * @ORM\OneToMany(targetEntity=Store::class, mappedBy="piece")
     */
    private $stores;

    /**
     * @ORM\OneToMany(targetEntity=Thermostat::class, mappedBy="piece", orphanRemoval=true)
     */
    private $thermostats;

    /**
     * @ORM\OneToMany(targetEntity=Volet::class, mappedBy="piece", orphanRemoval=true)
     */
    private $volets;

    public function __construct()
    {
        $this->capteurs = new ArrayCollection();
        $this->machines = new ArrayCollection();
        $this->lampes = new ArrayCollection();
        $this->stores = new ArrayCollection();
        $this->thermostats = new ArrayCollection();
        $this->volets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSmartHome(): ?SmartHome
    {
        return $this->smartHome;
    }

    public function setSmartHome(?SmartHome $smartHome): self
    {
        $this->smartHome = $smartHome;

        return $this;
    }

    /**
     * @return Collection|Capteur[]
     */
    public function getCapteurs(): Collection
    {
        return $this->capteurs;
    }

    public function addCapteur(Capteur $capteur): self
    {
        if (!$this->capteurs->contains($capteur)) {
            $this->capteurs[] = $capteur;
            $capteur->setPiece($this);
        }

        return $this;
    }

    public function removeCapteur(Capteur $capteur): self
    {
        if ($this->capteurs->contains($capteur)) {
            $this->capteurs->removeElement($capteur);
            // set the owning side to null (unless already changed)
            if ($capteur->getPiece() === $this) {
                $capteur->setPiece(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Lampe[]
     */
    public function getLampes(): Collection
    {
        return $this->lampes;
    }

    public function addLampe(Lampe $lampe): self
    {
        if (!$this->lampes->contains($lampe)) {
            $this->lampes[] = $lampe;
            $lampe->setPiece($this);
        }

        return $this;
    }

    public function removeLampe(Lampe $lampe): self
    {
        if ($this->lampes->contains($lampe)) {
            $this->lampes->removeElement($lampe);
            // set the owning side to null (unless already changed)
            if ($lampe->getPiece() === $this) {
                $lampe->setPiece(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Store[]
     */
    public function getStores(): Collection
    {
        return $this->stores;
    }

    public function addStore(Store $store): self
    {
        if (!$this->stores->contains($store)) {
            $this->stores[] = $store;
            $store->setPiece($this);
        }

        return $this;
    }

    public function removeStore(Store $store): self
    {
        if ($this->stores->contains($store)) {
            $this->stores->removeElement($store);
            // set the owning side to null (unless already changed)
            if ($store->getPiece() === $this) {
                $store->setPiece(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Thermostat[]
     */
    public function getThermostats(): Collection
    {
        return $this->thermostats;
    }

    public function addThermostat(Thermostat $thermostat): self
    {
        if (!$this->thermostats->contains($thermostat)) {
            $this->thermostats[] = $thermostat;
            $thermostat->setPiece($this);
        }

        return $this;
    }

    public function removeThermostat(Thermostat $thermostat): self
    {
        if ($this->thermostats->contains($thermostat)) {
            $this->thermostats->removeElement($thermostat);
            // set the owning side to null (unless already changed)
            if ($thermostat->getPiece() === $this) {
                $thermostat->setPiece(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Volet[]
     */
    public function getVolets(): Collection
    {
        return $this->volets;
    }

    public function addVolet(Volet $volet): self
    {
        if (!$this->volets->contains($volet)) {
            $this->volets[] = $volet;
            $volet->setPiece($this);
        }

        return $this;
    }

    public function removeVolet(Volet $volet): self
    {
        if ($this->volets->contains($volet)) {
            $this->volets->removeElement($volet);
            // set the owning side to null (unless already changed)
            if ($volet->getPiece() === $this) {
                $volet->setPiece(null);
            }
        }

        return $this;
    }
}
