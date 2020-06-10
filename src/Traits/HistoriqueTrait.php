<?php


namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait HistoriqueTrait
{
    /**
     * @ORM\Column(type="datetime")
     */
   private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
   private $modifiedAt;

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
    public function getModifiedAt(): ?\DateTimeInterface
    {
        return $this->modifiedAt;
    }


    /**
     * @ORM\PrePersist()
     */
    public function prePersist(){
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @ORM\PostUpdate()
     */
    public function postUpdate(){
        dump($this);
    }

}