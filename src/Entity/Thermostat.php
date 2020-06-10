<?php

namespace App\Entity;

use App\Repository\ThermostatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ThermostatRepository::class)
 */
class Thermostat extends Machine
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
    private $plageReglage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sonde;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $tempAmbiante;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $uniteMesure;

    /**
     * @ORM\OneToMany(targetEntity=ScenarioTemp::class, mappedBy="thermostat")
     */
    private $scenarios;

    /**
     * @ORM\ManyToOne(targetEntity=CentraleAlarme::class, inversedBy="thermostats")
     */
    private $centraleAlarme;

    /**
     * @ORM\ManyToOne(targetEntity=CompteurConsommationThermique::class, inversedBy="thermostats")
     */
    private $compteurConsommationThermique;

    /**
     * @ORM\OneToOne(targetEntity=Actionneur::class, cascade={"persist", "remove"})
     */
    private $actionneur;

    /**
     * @ORM\ManyToOne(targetEntity=Piece::class, inversedBy="thermostats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $piece;

    public function __construct()
    {
        $this->scenarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlageReglage(): ?string
    {
        return $this->plageReglage;
    }

    public function setPlageReglage(string $plageReglage): self
    {
        $this->plageReglage = $plageReglage;

        return $this;
    }

    public function getSonde(): ?string
    {
        return $this->sonde;
    }

    public function setSonde(string $sonde): self
    {
        $this->sonde = $sonde;

        return $this;
    }

    public function getTempAmbiante(): ?string
    {
        return $this->tempAmbiante;
    }

    public function setTempAmbiante(string $tempAmbiante): self
    {
        $this->tempAmbiante = $tempAmbiante;

        return $this;
    }

    public function getUniteMesure(): ?string
    {
        return $this->uniteMesure;
    }

    public function setUniteMesure(string $uniteMesure): self
    {
        $this->uniteMesure = $uniteMesure;

        return $this;
    }

    /**
     * @return Collection|ScenarioTemp[]
     */
    public function getScenarios(): Collection
    {
        return $this->scenarios;
    }

    public function addScenario(ScenarioTemp $scenario): self
    {
        if (!$this->scenarios->contains($scenario)) {
            $this->scenarios[] = $scenario;
            $scenario->setThermostat($this);
        }

        return $this;
    }

    public function removeScenario(ScenarioTemp $scenario): self
    {
        if ($this->scenarios->contains($scenario)) {
            $this->scenarios->removeElement($scenario);
            // set the owning side to null (unless already changed)
            if ($scenario->getThermostat() === $this) {
                $scenario->setThermostat(null);
            }
        }

        return $this;
    }

    public function getCentraleAlarme(): ?CentraleAlarme
    {
        return $this->centraleAlarme;
    }

    public function setCentraleAlarme(?CentraleAlarme $centraleAlarme): self
    {
        $this->centraleAlarme = $centraleAlarme;

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

    public function getActionneur(): ?Actionneur
    {
        return $this->actionneur;
    }

    public function setActionneur(?Actionneur $actionneur): self
    {
        $this->actionneur = $actionneur;

        return $this;
    }

    public function getPiece(): ?Piece
    {
        return $this->piece;
    }

    public function setPiece(?Piece $piece): self
    {
        $this->piece = $piece;

        return $this;
    }
}
