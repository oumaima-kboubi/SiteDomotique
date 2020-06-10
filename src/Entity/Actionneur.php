<?php

namespace App\Entity;

use App\Repository\ActionneurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ActionneurRepository::class)
 */
class Actionneur extends Appareil
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
    private $phenomenePhysiqueUtilise;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $principeMisEnOeuvre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeEnergieUtilisee;

    /**
     * @ORM\OneToMany(targetEntity=Etat::class, mappedBy="actionneur")
     */
    private $etats;

    /**
     * @ORM\OneToOne(targetEntity=Scenario::class, inversedBy="actionneur", cascade={"persist", "remove"})
     */
    private $scenarioEnExecution;

    public function __construct()
    {
        $this->etats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhenomenePhysiqueUtilise(): ?string
    {
        return $this->phenomenePhysiqueUtilise;
    }

    public function setPhenomenePhysiqueUtilise(string $phenomenePhysiqueUtilise): self
    {
        $this->phenomenePhysiqueUtilise = $phenomenePhysiqueUtilise;

        return $this;
    }

    public function getPrincipeMisEnOeuvre(): ?string
    {
        return $this->principeMisEnOeuvre;
    }

    public function setPrincipeMisEnOeuvre(string $principeMisEnOeuvre): self
    {
        $this->principeMisEnOeuvre = $principeMisEnOeuvre;

        return $this;
    }

    public function getTypeEnergieUtilisee(): ?string
    {
        return $this->typeEnergieUtilisee;
    }

    public function setTypeEnergieUtilisee(string $typeEnergieUtilisee): self
    {
        $this->typeEnergieUtilisee = $typeEnergieUtilisee;

        return $this;
    }

    /**
     * @return Collection|Etat[]
     */
    public function getEtats(): Collection
    {
        return $this->etats;
    }

    public function addEtat(Etat $etat): self
    {
        if (!$this->etats->contains($etat)) {
            $this->etats[] = $etat;
            $etat->setActionneur($this);
        }

        return $this;
    }

    public function removeEtat(Etat $etat): self
    {
        if ($this->etats->contains($etat)) {
            $this->etats->removeElement($etat);
            // set the owning side to null (unless already changed)
            if ($etat->getActionneur() === $this) {
                $etat->setActionneur(null);
            }
        }

        return $this;
    }

    public function getScenarioEnExecution(): ?Scenario
    {
        return $this->scenarioEnExecution;
    }

    public function setScenarioEnExecution(?Scenario $scenarioEnExecution): self
    {
        $this->scenarioEnExecution = $scenarioEnExecution;

        return $this;
    }
}
