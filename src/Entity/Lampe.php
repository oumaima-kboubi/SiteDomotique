<?php

namespace App\Entity;

use App\Repository\LampeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LampeRepository::class)
 */
class Lampe extends Machine
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $fluxLumineux;

    /**
     * @ORM\OneToMany(targetEntity=ScenarioEclairage::class, mappedBy="lampe")
     */
    private $scenario;

    /**
     * @ORM\ManyToOne(targetEntity=CompteurConsommationElectrique::class, inversedBy="lampes")
     */
    private $compteurConsommationElectrique;

    /**
     * @ORM\OneToOne(targetEntity=Actionneur::class, cascade={"persist", "remove"})
     */
    private $actionneur;

    /**
     * @ORM\ManyToOne(targetEntity=Piece::class, inversedBy="lampes")
     */
    private $piece;

    public function __construct()
    {
        $this->scenario = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFluxLumineux(): ?int
    {
        return $this->fluxLumineux;
    }

    public function setFluxLumineux(int $fluxLumineux): self
    {
        $this->fluxLumineux = $fluxLumineux;

        return $this;
    }

    /**
     * @return Collection|ScenarioEclairage[]
     */
    public function getScenario(): Collection
    {
        return $this->scenario;
    }

    public function addScenario(ScenarioEclairage $scenario): self
    {
        if (!$this->scenario->contains($scenario)) {
            $this->scenario[] = $scenario;
            $scenario->setLampe($this);
        }

        return $this;
    }

    public function removeScenario(ScenarioEclairage $scenario): self
    {
        if ($this->scenario->contains($scenario)) {
            $this->scenario->removeElement($scenario);
            // set the owning side to null (unless already changed)
            if ($scenario->getLampe() === $this) {
                $scenario->setLampe(null);
            }
        }

        return $this;
    }

    public function getCompteurConsommationElectrique(): ?CompteurConsommationElectrique
    {
        return $this->compteurConsommationElectrique;
    }

    public function setCompteurConsommationElectrique(?CompteurConsommationElectrique $compteurConsommationElectrique): self
    {
        $this->compteurConsommationElectrique = $compteurConsommationElectrique;

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

    public function getPiece(): ?Piece
    {
        return $this->piece;
    }

    public function setPiece(?Piece $piece): self
    {
        $this->piece = $piece;

        return $this;
    }
}
