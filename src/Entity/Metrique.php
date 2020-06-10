<?php

namespace App\Entity;

use App\Repository\MetriqueRepository;
use App\Traits\HistoriqueTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MetriqueRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Metrique
{
    use HistoriqueTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Capteur::class, inversedBy="metriques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $capteur;

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

    public function getCapteur(): ?Capteur
    {
        return $this->capteur;
    }

    public function setCapteur(?Capteur $capteur): self
    {
        $this->capteur = $capteur;

        return $this;
    }
}
