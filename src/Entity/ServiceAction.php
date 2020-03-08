<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceActionRepository")
 */
class ServiceAction
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
     * @ORM\Column(type="boolean")
     */
    private $performedByProducer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TimeInterval", inversedBy="serviceActions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $timeInterval;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PreservativeProduct", inversedBy="serviceActions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $preservativeProduct;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $preservativeProductAmount;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $timeIntervalValue;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipment", inversedBy="serviceActions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $equipment;

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

    public function getPerformedByProducer(): ?bool
    {
        return $this->performedByProducer;
    }

    public function setPerformedByProducer(bool $performedByProducer): self
    {
        $this->performedByProducer = $performedByProducer;

        return $this;
    }

    public function getTimeInterval(): ?TimeInterval
    {
        return $this->timeInterval;
    }

    public function setTimeInterval(?TimeInterval $timeInterval): self
    {
        $this->timeInterval = $timeInterval;

        return $this;
    }

    public function getPreservativeProduct(): ?PreservativeProduct
    {
        return $this->preservativeProduct;
    }

    public function setPreservativeProduct(?PreservativeProduct $preservativeProduct): self
    {
        $this->preservativeProduct = $preservativeProduct;

        return $this;
    }

    public function getPreservativeProductAmount(): ?float
    {
        return $this->preservativeProductAmount;
    }

    public function setPreservativeProductAmount(?float $preservativeProductAmount): self
    {
        $this->preservativeProductAmount = $preservativeProductAmount;

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

    public function getTimeIntervalValue(): ?int
    {
        return $this->timeIntervalValue;
    }

    public function setTimeIntervalValue(?int $timeIntervalValue): self
    {
        $this->timeIntervalValue = $timeIntervalValue;

        return $this;
    }

    public function getEquipment(): ?Equipment
    {
        return $this->equipment;
    }

    public function setEquipment(?Equipment $equipment): self
    {
        $this->equipment = $equipment;

        return $this;
    }
}
