<?php

namespace App\Entity;

use App\Repository\ScenarioEclairageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioEclairageRepository::class)
 */
class ScenarioEclairage extends Scenario
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
    private $degreLuminosite;

    /**
     * @ORM\ManyToOne(targetEntity=Lampe::class, inversedBy="scenario")
     */
    private $lampe;

    /**
     * @ORM\ManyToOne(targetEntity=Actionneur::class)
     */
    private $actionneur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDegreLuminosite(): ?string
    {
        return $this->degreLuminosite;
    }

    public function setDegreLuminosite(string $degreLuminosite): self
    {
        $this->degreLuminosite = $degreLuminosite;

        return $this;
    }

    public function getLampe(): ?Lampe
    {
        return $this->lampe;
    }

    public function setLampe(?Lampe $lampe): self
    {
        $this->lampe = $lampe;

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
