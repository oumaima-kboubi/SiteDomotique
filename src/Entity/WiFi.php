<?php

namespace App\Entity;

use App\Repository\WiFiRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WiFiRepository::class)
 */
class WiFi
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
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=SmartHome::class, inversedBy="wifis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $smartHome;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSmartHome(): ?SmartHome
    {
        return $this->smartHome;
    }

    public function setSmartHome(?SmartHome $smartHome): self
    {
        $this->smartHome = $smartHome;

        return $this;
    }
}
