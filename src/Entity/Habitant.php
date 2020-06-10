<?php

namespace App\Entity;

use App\Repository\HabitantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HabitantRepository::class)
 */
class Habitant extends Utilisateur
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
     * @ORM\ManyToMany(targetEntity=SmartHome::class, mappedBy="habitants")
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
            $smartHome->addHabitant($this);
        }

        return $this;
    }

    public function removeSmartHome(SmartHome $smartHome): self
    {
        if ($this->smartHomes->contains($smartHome)) {
            $this->smartHomes->removeElement($smartHome);
            $smartHome->removeHabitant($this);
        }

        return $this;
    }
}
