<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceActionPerformedRepository")
 */
class ServiceActionPerformed
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ServiceAction", inversedBy="serviceActionPerformed")
     */
    private $serviceAction;

    /**
     * @ORM\Column(type="datetime")
     */
    private $serviceActionDate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Worker", inversedBy="serviceActionPerformed")
     */
    private $performedBy;

    /**
     * @ORM\Column(type="datetime")
     */
    private $serviceActionPlannedDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    public function __construct()
    {
        $this->serviceAction = new ArrayCollection();
        $this->performedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ServiceAction[]
     */
    public function getServiceAction(): Collection
    {
        return $this->serviceAction;
    }

    public function addServiceAction(ServiceAction $serviceAction): self
    {
        if (!$this->serviceAction->contains($serviceAction)) {
            $this->serviceAction[] = $serviceAction;
        }

        return $this;
    }

    public function removeServiceAction(ServiceAction $serviceAction): self
    {
        if ($this->serviceAction->contains($serviceAction)) {
            $this->serviceAction->removeElement($serviceAction);
        }

        return $this;
    }

    public function getServiceActionDate(): ?\DateTimeInterface
    {
        return $this->serviceActionDate;
    }

    public function setServiceActionDate(\DateTimeInterface $serviceActionDate): self
    {
        $this->serviceActionDate = $serviceActionDate;

        return $this;
    }

    /**
     * @return Collection|Worker[]
     */
    public function getPerformedBy(): Collection
    {
        return $this->performedBy;
    }

    public function addPerformedBy(Worker $performedBy): self
    {
        if (!$this->performedBy->contains($performedBy)) {
            $this->performedBy[] = $performedBy;
        }

        return $this;
    }

    public function removePerformedBy(Worker $performedBy): self
    {
        if ($this->performedBy->contains($performedBy)) {
            $this->performedBy->removeElement($performedBy);
        }

        return $this;
    }

    public function getServiceActionPlannedDate(): ?\DateTimeInterface
    {
        return $this->serviceActionPlannedDate;
    }

    public function setServiceActionPlannedDate(\DateTimeInterface $serviceActionPlannedDate): self
    {
        $this->serviceActionPlannedDate = $serviceActionPlannedDate;

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
}
