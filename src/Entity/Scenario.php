<?php

namespace App\Entity;

use App\Repository\ScenarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioRepository::class)
 */
abstract class Scenario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebutActivation;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFinActivation;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isUsingSensor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $repetition;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebutActivation(): ?\DateTimeInterface
    {
        return $this->dateDebutActivation;
    }

    public function setDateDebutActivation(\DateTimeInterface $dateDebutActivation): self
    {
        $this->dateDebutActivation = $dateDebutActivation;

        return $this;
    }

    public function getDateFinActivation(): ?\DateTimeInterface
    {
        return $this->dateFinActivation;
    }

    public function setDateFinActivation(\DateTimeInterface $dateFinActivation): self
    {
        $this->dateFinActivation = $dateFinActivation;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsUsingSensor(): ?bool
    {
        return $this->isUsingSensor;
    }

    public function setIsUsingSensor(bool $isUsingSensor): self
    {
        $this->isUsingSensor = $isUsingSensor;

        return $this;
    }

    public function getRepetition(): ?bool
    {
        return $this->repetition;
    }

    public function setRepetition(bool $repetition): self
    {
        $this->repetition = $repetition;

        return $this;
    }
}
