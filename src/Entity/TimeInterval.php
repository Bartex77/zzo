<?php

namespace App\Entity;

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
}
