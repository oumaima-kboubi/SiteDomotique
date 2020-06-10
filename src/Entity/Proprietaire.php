<?php

namespace App\Entity;

use App\Repository\ProprietaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProprietaireRepository::class)
 */
class Proprietaire extends Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fuseauHoraire;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $CIN;

    /**
     * @ORM\OneToMany(targetEntity=SmartHome::class, mappedBy="proprietaire", orphanRemoval=true)
     */
    private $smartHomes;

    public function __construct()
    {
        $this->smartHomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFuseauHoraire(): ?string
    {
        return $this->fuseauHoraire;
    }

    public function setFuseauHoraire(string $fuseauHoraire): self
    {
        $this->fuseauHoraire = $fuseauHoraire;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getCIN(): ?int
    {
        return $this->CIN;
    }

    public function setCIN(int $CIN): self
    {
        $this->CIN = $CIN;

        return $this;
    }

    /**
     * @return Collection|SmartHome[]
     */
    public function getSmartHomes(): Collection
    {
        return $this->smartHomes;
    }

    public function addSmartHome(SmartHome $smartHome): self
    {
        if (!$this->smartHomes->contains($smartHome)) {
            $this->smartHomes[] = $smartHome;
            $smartHome->setProprietaire($this);
        }

        return $this;
    }

    public function removeSmartHome(SmartHome $smartHome): self
    {
        if ($this->smartHomes->contains($smartHome)) {
            $this->smartHomes->removeElement($smartHome);
            // set the owning side to null (unless already changed)
            if ($smartHome->getProprietaire() === $this) {
                $smartHome->setProprietaire(null);
            }
        }

        return $this;
    }
}
