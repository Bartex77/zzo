<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WorkerRepository")
 */
class Worker
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ServiceActionPerformed", mappedBy="performedBy")
     */
    private $serviceActionPerformed;

    public function __construct()
    {
        $this->serviceActionPerformed = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return Collection|ServiceActionPerformed[]
     */
    public function getServiceActionPerformed(): Collection
    {
        return $this->serviceActionPerformed;
    }

    public function addServiceActionPerformed(ServiceActionPerformed $serviceActionPerformed): self
    {
        if (!$this->serviceActionPerformed->contains($serviceActionPerformed)) {
            $this->serviceActionPerformed[] = $serviceActionPerformed;
            $serviceActionPerformed->addPerformedBy($this);
        }

        return $this;
    }

    public function removeServiceActionPerformed(ServiceActionPerformed $serviceActionPerformed): self
    {
        if ($this->serviceActionPerformed->contains($serviceActionPerformed)) {
            $this->serviceActionPerformed->removeElement($serviceActionPerformed);
            $serviceActionPerformed->removePerformedBy($this);
        }

        return $this;
    }
}
