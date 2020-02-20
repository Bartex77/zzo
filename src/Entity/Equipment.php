<?php

namespace App\Entity;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\EquipmentProducer", inversedBy="equipment")
     */
    private $EquipmentProducer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EquipmentType", inversedBy="equipment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $EquipmentType;

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

    public function getEquipmentProducer(): ?EquipmentProducer
    {
        return $this->EquipmentProducer;
    }

    public function setEquipmentProducer(?EquipmentProducer $EquipmentProducer): self
    {
        $this->EquipmentProducer = $EquipmentProducer;

        return $this;
    }

    public function getEquipmentType(): ?EquipmentType
    {
        return $this->EquipmentType;
    }

    public function setEquipmentType(?EquipmentType $EquipmentType): self
    {
        $this->EquipmentType = $EquipmentType;

        return $this;
    }
}
