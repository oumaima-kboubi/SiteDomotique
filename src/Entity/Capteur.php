<?php

namespace App\Entity;

use App\Repository\CapteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CapteurRepository::class)
 */
class Capteur extends Appareil
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
    private $apportEnergetique;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $seuilDeclenchement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeDetection;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeSortie;

    /**
     * @ORM\ManyToOne(targetEntity=Piece::class, inversedBy="capteurs")
     */
    private $piece;

    /**
     * @ORM\OneToMany(targetEntity=Metrique::class, mappedBy="capteur", orphanRemoval=true)
     */
    private $metriques;

    public function __construct()
    {
        $this->metriques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApportEnergetique(): ?string
    {
        return $this->apportEnergetique;
    }

    public function setApportEnergetique(string $apportEnergetique): self
    {
        $this->apportEnergetique = $apportEnergetique;

        return $this;
    }

    public function getSeuilDeclenchement(): ?string
    {
        return $this->seuilDeclenchement;
    }

    public function setSeuilDeclenchement(string $seuilDeclenchement): self
    {
        $this->seuilDeclenchement = $seuilDeclenchement;

        return $this;
    }

    public function getTypeDetection(): ?string
    {
        return $this->typeDetection;
    }

    public function setTypeDetection(string $typeDetection): self
    {
        $this->typeDetection = $typeDetection;

        return $this;
    }

    public function getTypeSortie(): ?string
    {
        return $this->typeSortie;
    }

    public function setTypeSortie(string $typeSortie): self
    {
        $this->typeSortie = $typeSortie;

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

    /**
     * @return Collection|Metrique[]
     */
    public function getMetriques(): Collection
    {
        return $this->metriques;
    }

    public function addMetrique(Metrique $metrique): self
    {
        if (!$this->metriques->contains($metrique)) {
            $this->metriques[] = $metrique;
            $metrique->setCapteur($this);
        }

        return $this;
    }

    public function removeMetrique(Metrique $metrique): self
    {
        if ($this->metriques->contains($metrique)) {
            $this->metriques->removeElement($metrique);
            // set the owning side to null (unless already changed)
            if ($metrique->getCapteur() === $this) {
                $metrique->setCapteur(null);
            }
        }

        return $this;
    }
}
