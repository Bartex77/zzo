<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PreservativeProductRepository")
 */
class PreservativeProduct
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
     * @ORM\ManyToOne(targetEntity="App\Entity\PreservativeMaterial")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PreservativeMaterial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PreservativeMaterialUnit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $PreservativeMaterialUnit;

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

    public function getPreservativeMaterial(): ?PreservativeMaterial
    {
        return $this->PreservativeMaterial;
    }

    public function setPreservativeMaterial(?PreservativeMaterial $PreservativeMaterial): self
    {
        $this->PreservativeMaterial = $PreservativeMaterial;

        return $this;
    }

    public function getPreservativeMaterialUnit(): ?PreservativeMaterialUnit
    {
        return $this->PreservativeMaterialUnit;
    }

    public function setPreservativeMaterialUnit(?PreservativeMaterialUnit $PreservativeMaterialUnit): self
    {
        $this->PreservativeMaterialUnit = $PreservativeMaterialUnit;

        return $this;
    }
}
