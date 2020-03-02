<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $preservativeMaterial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PreservativeMaterialUnit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $preservativeMaterialUnit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServiceAction", mappedBy="preservativeProduct")
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

    public function getPreservativeMaterial(): ?PreservativeMaterial
    {
        return $this->preservativeMaterial;
    }

    public function setPreservativeMaterial(?PreservativeMaterial $preservativeMaterial): self
    {
        $this->preservativeMaterial = $preservativeMaterial;

        return $this;
    }

    public function getPreservativeMaterialUnit(): ?PreservativeMaterialUnit
    {
        return $this->preservativeMaterialUnit;
    }

    public function setPreservativeMaterialUnit(?PreservativeMaterialUnit $preservativeMaterialUnit): self
    {
        $this->preservativeMaterialUnit = $preservativeMaterialUnit;

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
            $serviceAction->setPreservativeProduct($this);
        }

        return $this;
    }

    public function removeServiceAction(ServiceAction $serviceAction): self
    {
        if ($this->serviceActions->contains($serviceAction)) {
            $this->serviceActions->removeElement($serviceAction);
            // set the owning side to null (unless already changed)
            if ($serviceAction->getPreservativeProduct() === $this) {
                $serviceAction->setPreservativeProduct(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
