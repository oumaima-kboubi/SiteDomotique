<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use App\Traits\HistoriqueTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtatRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Etat
{
    use HistoriqueTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Actionneur::class, inversedBy="etats")
     */
    private $actionneur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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
