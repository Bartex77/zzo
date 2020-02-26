<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentProducerRepository")
 */
class EquipmentProducer
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\EquipmentType", mappedBy="equipmentProducer", cascade={"persist", "remove"})
     */
    private $equipmentType;

    public function __construct()
    {
        $this->equipmentType = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipmentType(): Collection
    {
        return $this->equipmentType;
    }

    public function addEquipmentType(EquipmentType $equipmentType): self
    {
        if (!$this->equipmentType->contains($equipmentType)) {
            $this->equipmentType[] = $equipmentType;
            $equipmentType->setEquipmentProducer($this);
        }

        return $this;
    }

    public function removeEquipment(EquipmentType $equipmentType): self
    {
        if ($this->equipmentType->contains($equipmentType)) {
            $this->equipmentType->removeElement($equipmentType);
            // set the owning side to null (unless already changed)
            if ($equipmentType->getEquipmentProducer() === $this) {
                $equipmentType->setEquipmentProducer(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
