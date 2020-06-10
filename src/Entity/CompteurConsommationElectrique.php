<?php

namespace App\Entity;

use App\Repository\CompteurConsommationElectriqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteurConsommationElectriqueRepository::class)
 */
class CompteurConsommationElectrique extends Compteur
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
    private $courantMax;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3)
     */
    private $courantMin;

    /**
     * @ORM\OneToMany(targetEntity=Lampe::class, mappedBy="compteurConsommationElectrique")
     */
    private $lampes;

    public function __construct()
    {
        $this->lampes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourantMax(): ?string
    {
        return $this->courantMax;
    }

    public function setCourantMax(string $courantMax): self
    {
        $this->courantMax = $courantMax;

        return $this;
    }

    public function getCourantMin(): ?string
    {
        return $this->courantMin;
    }

    public function setCourantMin(string $courantMin): self
    {
        $this->courantMin = $courantMin;

        return $this;
    }

    /**
     * @return Collection|Lampe[]
     */
    public function getLampes(): Collection
    {
        return $this->lampes;
    }

    public function addLampe(Lampe $lampe): self
    {
        if (!$this->lampes->contains($lampe)) {
            $this->lampes[] = $lampe;
            $lampe->setCompteurConsommationElectrique($this);
        }

        return $this;
    }

    public function removeLampe(Lampe $lampe): self
    {
        if ($this->lampes->contains($lampe)) {
            $this->lampes->removeElement($lampe);
            // set the owning side to null (unless already changed)
            if ($lampe->getCompteurConsommationElectrique() === $this) {
                $lampe->setCompteurConsommationElectrique(null);
            }
        }

        return $this;
    }
}
