<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(type="string", length=255)
     */
    private $number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EquipmentType", inversedBy="equipment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipmentType;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServiceAction", mappedBy="equipment", orphanRemoval=true)
     */
    private $serviceActions;

    public function __construct()
    {
        $this->serviceActions = new ArrayCollection();
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

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getEquipmentType(): ?EquipmentType
    {
        return $this->equipmentType;
    }

    public function setEquipmentType(?EquipmentType $equipmentType): self
    {
        $this->equipmentType = $equipmentType;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Collection|ServiceAction[]
     */
    public function getServiceActions(): Collection
    {
        return $this->serviceActions;
    }

    public function addServiceAction(ServiceAction $serviceAction): self
    {
        if (!$this->serviceActions->contains($serviceAction)) {
            $this->serviceActions[] = $serviceAction;
            $serviceAction->setEquipment($this);
        }

        return $this;
    }

    public function removeServiceAction(ServiceAction $serviceAction): self
    {
        if ($this->serviceActions->contains($serviceAction)) {
            $this->serviceActions->removeElement($serviceAction);
            // set the owning side to null (unless already changed)
            if ($serviceAction->getEquipment() === $this) {
                $serviceAction->setEquipment(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
