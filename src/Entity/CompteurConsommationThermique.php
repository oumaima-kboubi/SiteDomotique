<?php

namespace App\Entity;

use App\Repository\CompteurConsommationThermiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteurConsommationThermiqueRepository::class)
 */
class CompteurConsommationThermique extends Compteur
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
    private $degreProtection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $environnementDeFctmnt;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $longueurCableCalculateur;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $tempMax;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $tempMin;

    /**
     * @ORM\OneToMany(targetEntity=Thermostat::class, mappedBy="compteurConsommationThermique")
     */
    private $thermostats;

    public function __construct()
    {
        $this->thermostats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegreProtection(): ?string
    {
        return $this->degreProtection;
    }

    public function setDegreProtection(string $degreProtection): self
    {
        $this->degreProtection = $degreProtection;

        return $this;
    }

    public function getEnvironnementDeFctmnt(): ?string
    {
        return $this->environnementDeFctmnt;
    }

    public function setEnvironnementDeFctmnt(string $environnementDeFctmnt): self
    {
        $this->environnementDeFctmnt = $environnementDeFctmnt;

        return $this;
    }

    public function getLongueurCableCalculateur(): ?string
    {
        return $this->longueurCableCalculateur;
    }

    public function setLongueurCableCalculateur(string $longueurCableCalculateur): self
    {
        $this->longueurCableCalculateur = $longueurCableCalculateur;

        return $this;
    }

    public function getTempMax(): ?string
    {
        return $this->tempMax;
    }

    public function setTempMax(string $tempMax): self
    {
        $this->tempMax = $tempMax;

        return $this;
    }

    public function getTempMin(): ?string
    {
        return $this->tempMin;
    }

    public function setTempMin(string $tempMin): self
    {
        $this->tempMin = $tempMin;

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
            $thermostat->setCompteurConsommationThermique($this);
        }

        return $this;
    }

    public function removeThermostat(Thermostat $thermostat): self
    {
        if ($this->thermostats->contains($thermostat)) {
            $this->thermostats->removeElement($thermostat);
            // set the owning side to null (unless already changed)
            if ($thermostat->getCompteurConsommationThermique() === $this) {
                $thermostat->setCompteurConsommationThermique(null);
            }
        }

        return $this;
    }
}
