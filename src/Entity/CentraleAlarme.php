<?php

namespace App\Entity;

use App\Repository\CentraleAlarmeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CentraleAlarmeRepository::class)
 */
class CentraleAlarme extends Machine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alimentationPrincipale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alimentationSecondaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dimensions;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreBoucles;

    /**
     * @ORM\Column(type="integer")
     */
    private $poids;

    /**
     * @ORM\OneToMany(targetEntity=Thermostat::class, mappedBy="centraleAlarme")
     */
    private $thermostats;

    /**
     * @ORM\OneToOne(targetEntity=Actionneur::class, cascade={"persist", "remove"})
     */
    private $actionneur;

    /**
     * @ORM\OneToOne(targetEntity=SmartHome::class, inversedBy="centraleAlarme", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $smartHome;

    public function __construct()
    {
        $this->thermostats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlimentationPrincipale():  ?string
    {
        return $this->alimentationPrincipale;
    }

    public function setAlimentationPrincipale(string $alimentationPrincipale): self
    {
        $this->alimentationPrincipale = $alimentationPrincipale;

        return $this;
    }

    public function getAlimentationSecondaire():  ?string
    {
        return $this->alimentationSecondaire;
    }

    public function setAlimentationSecondaire(string $alimentationSecondaire): self
    {
        $this->alimentationSecondaire = $alimentationSecondaire;

        return $this;
    }

    public function getDimensions(): ?string
    {
        return $this->dimensions;
    }

    public function setDimensions(string $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    public function getNbreBoucles(): ?int
    {
        return $this->nbreBoucles;
    }

    public function setNbreBoucles(int $nbreBoucles): self
    {
        $this->nbreBoucles = $nbreBoucles;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): self
    {
        $this->poids = $poids;

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
            $thermostat->setCentraleAlarme($this);
        }

        return $this;
    }

    public function removeThermostat(Thermostat $thermostat): self
    {
        if ($this->thermostats->contains($thermostat)) {
            $this->thermostats->removeElement($thermostat);
            // set the owning side to null (unless already changed)
            if ($thermostat->getCentraleAlarme() === $this) {
                $thermostat->setCentraleAlarme(null);
            }
        }

        return $this;
    }

    public function getActionneur(): ?Actionneur
    {
        return $this->actionneur;
    }

    public function setActionneur(?Actionneur $actionneur): self
    {
        $this->actionneur = $actionneur;

        return $this;
    }

    public function getSmartHome(): ?SmartHome
    {
        return $this->smartHome;
    }

    public function setSmartHome(SmartHome $smartHome): self
    {
        $this->smartHome = $smartHome;

        return $this;
    }
}
