<?php

namespace App\Entity;

use App\Repository\ScenarioTempRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioTempRepository::class)
 */
class ScenarioTemp extends Scenario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $seuilMax;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $seuilMin;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $valeurTemp;

    /**
     * @ORM\ManyToOne(targetEntity=Thermostat::class, inversedBy="scenarios")
     */
    private $thermostat;

    /**
     * @ORM\ManyToOne(targetEntity=Actionneur::class)
     */
    private $actionneur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeuilMax(): ?string
    {
        return $this->seuilMax;
    }

    public function setSeuilMax(string $seuilMax): self
    {
        $this->seuilMax = $seuilMax;

        return $this;
    }

    public function getSeuilMin(): ?string
    {
        return $this->seuilMin;
    }

    public function setSeuilMin(string $seuilMin): self
    {
        $this->seuilMin = $seuilMin;

        return $this;
    }

    public function getValeurTemp(): ?string
    {
        return $this->valeurTemp;
    }

    public function setValeurTemp(string $valeurTemp): self
    {
        $this->valeurTemp = $valeurTemp;

        return $this;
    }

    public function getThermostat(): ?Thermostat
    {
        return $this->thermostat;
    }

    public function setThermostat(?Thermostat $thermostat): self
    {
        $this->thermostat = $thermostat;

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
}
