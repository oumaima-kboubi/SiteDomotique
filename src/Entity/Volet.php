<?php

namespace App\Entity;

use App\Repository\VoletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoletRepository::class)
 */
class Volet extends Machine
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
    private $matiere;

    /**
     * @ORM\OneToMany(targetEntity=ScenarioVolet::class, mappedBy="volet")
     */
    private $scenarios;

    /**
     * @ORM\OneToOne(targetEntity=Actionneur::class, cascade={"persist", "remove"})
     */
    private $actionneur;

    /**
     * @ORM\ManyToOne(targetEntity=Piece::class, inversedBy="volets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $piece;

    public function __construct()
    {
        $this->scenarios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * @return Collection|ScenarioVolet[]
     */
    public function getScenarios(): Collection
    {
        return $this->scenarios;
    }

    public function addScenario(ScenarioVolet $scenario): self
    {
        if (!$this->scenarios->contains($scenario)) {
            $this->scenarios[] = $scenario;
            $scenario->setVolet($this);
        }

        return $this;
    }

    public function removeScenario(ScenarioVolet $scenario): self
    {
        if ($this->scenarios->contains($scenario)) {
            $this->scenarios->removeElement($scenario);
            // set the owning side to null (unless already changed)
            if ($scenario->getVolet() === $this) {
                $scenario->setVolet(null);
            }
        }

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
