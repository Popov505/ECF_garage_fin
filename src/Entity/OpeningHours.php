<?php

namespace App\Entity;

use App\Repository\OpeningHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningHoursRepository::class)]
class OpeningHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $open_day = null;

    #[ORM\Column(length: 255)]
    private ?string $open_hour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpenDay(): ?string
    {
        return $this->open_day;
    }

    public function setOpenDay(string $open_day): static
    {
        $this->open_day = $open_day;

        return $this;
    }

    public function getOpenHour(): ?string
    {
        return $this->open_hour;
    }

    public function setOpenHour(string $open_hour): static
    {
        $this->open_hour = $open_hour;

        return $this;
    }
}
