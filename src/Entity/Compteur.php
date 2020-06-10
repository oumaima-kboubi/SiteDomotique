<?php

namespace App\Entity;

use App\Repository\CompteurRepository;
use App\Traits\HistoriqueTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteurRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
abstract class Compteur
{
    use HistoriqueTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $seuilMax;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?int
    {
        return $this->reference;
    }

    public function setReference(int $reference): self
    {
        $this->reference = $reference;

        return $this;
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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
