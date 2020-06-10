<?php

namespace App\Entity;

use App\Repository\ScenarioStoreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioStoreRepository::class)
 */
class ScenarioStore extends Scenario
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
    private $inclinaison;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $niveauOuverture;

    /**
     * @ORM\ManyToOne(targetEntity=Store::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=true)
     */
    private $store;

    /**
     * @ORM\ManyToOne(targetEntity=Actionneur::class)
     */
    private $actionneur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInclinaison(): ?string
    {
        return $this->inclinaison;
    }

    public function setInclinaison(string $inclinaison): self
    {
        $this->inclinaison = $inclinaison;

        return $this;
    }

    public function getNiveauOuverture(): ?string
    {
        return $this->niveauOuverture;
    }

    public function setNiveauOuverture(string $niveauOuverture): self
    {
        $this->niveauOuverture = $niveauOuverture;

        return $this;
    }

    public function getStore(): ?Store
    {
        return $this->store;
    }

    public function setStore(?Store $store): self
    {
        $this->store = $store;

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
