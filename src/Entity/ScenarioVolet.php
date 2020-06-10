<?php

namespace App\Entity;

use App\Repository\ScenarioVoletRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioVoletRepository::class)
 */
class ScenarioVolet extends Scenario
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
    private $niveauElevation;

    /**
     * @ORM\ManyToOne(targetEntity=Volet::class, inversedBy="scenarios")
     */
    private $volet;

    /**
     * @ORM\ManyToOne(targetEntity=Actionneur::class)
     */
    private $actionneur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveauElevation(): ?string
    {
        return $this->niveauElevation;
    }

    public function setNiveauElevation(string $niveauElevation): self
    {
        $this->niveauElevation = $niveauElevation;

        return $this;
    }

    public function getVolet(): ?Volet
    {
        return $this->volet;
    }

    public function setVolet(?Volet $volet): self
    {
        $this->volet = $volet;

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
