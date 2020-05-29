<?php

namespace App\Entity;

use App\Repository\FootprintRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FootprintRepository::class)
 */
class Footprint
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
    private $expenseType;

    /**
     * @ORM\Column(type="integer")
     */
    private $ratio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExpenseType(): ?string
    {
        return $this->expenseType;
    }

    public function setExpenseType(string $expenseType): self
    {
        $this->expenseType = $expenseType;

        return $this;
    }

    public function getRatio(): ?int
    {
        return $this->ratio;
    }

    public function setRatio(int $ratio): self
    {
        $this->ratio = $ratio;

        return $this;
    }
}
