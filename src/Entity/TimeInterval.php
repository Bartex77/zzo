<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TimeIntervalRepository")
 */
class TimeInterval
{
    const TIME_UNITS = [
        'wh'    => 'roboczogodziny',
        'h'     => 'godziny',
        'd'     => 'dni',
        'w'     => 'tygodnie',
        'm'     => 'miesiące',
        'y'     => 'lata',
    ];

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
     * @ORM\Column(type="string", length=2)
     */
    private $timeUnit;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $value;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ServiceAction", mappedBy="timeInterval")
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

    public function getTimeUnit(): ?string
    {
        return $this->timeUnit;
    }

    public function setTimeUnit(string $timeUnit): self
    {
        $this->timeUnit = $timeUnit;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

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
            $serviceAction->setTimeInterval($this);
        }

        return $this;
    }

    public function removeServiceAction(ServiceAction $serviceAction): self
    {
        if ($this->serviceActions->contains($serviceAction)) {
            $this->serviceActions->removeElement($serviceAction);
            // set the owning side to null (unless already changed)
            if ($serviceAction->getTimeInterval() === $this) {
                $serviceAction->setTimeInterval(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
