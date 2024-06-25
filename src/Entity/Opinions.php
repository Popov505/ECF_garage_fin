<?php

namespace App\Entity;

use App\Repository\OpinionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: OpinionsRepository::class)]
#[UniqueEntity(fields: 'lastname', message: "Vous avez déjà laissé un commentaire.")]

class Opinions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 2,
        minMessage: 'Veuillez entrer plus de 1 caractère',
        max: 30, 
        maxMessage: 'Veuillez entrer moins de 31 caractères')]
    #[Assert\Regex(
        pattern:"/^[-'0-9a-zA-ZÀ-ÿ\s]+$/",
        message:"Vous avez entré des caractères non autorisés")]
    private ?string $lastname = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 2,
        minMessage: 'Veuillez entrer plus de 1 caractère',
        max: 255, 
        maxMessage: 'Veuillez entrer moins de 256 caractères')]
    #[Assert\Regex(
        pattern:"/^[-',;:.?!0-9a-zA-ZÀ-ÿ\s]+$/",
        message:"Vous avez entré des caractères non autorisés")]
    private ?string $commentary = null;

    #[ORM\Column(type: Types::INTEGER)]
    #[Assert\Length(
        min: 1,
        minMessage: 'Veuillez entrer une note entre 1 et 5',
        max: 1, 
        maxMessage: 'Veuillez entrer une note entre 1 et 5')]
    #[Assert\Regex(
        pattern:"/^[1-5]+$/",
        message:"Vous avez entré des caractères non autorisés")]
    private ?int $grade = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_validated = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCommentary(): ?string
    {
        return $this->commentary;
    }

    public function setCommentary(string $commentary): static
    {
        $this->commentary = $commentary;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): static
    {
        $this->grade = $grade;

        return $this;
    }

    public function isIsValidated(): ?bool
    {
        return $this->is_validated;
    }

    public function setIsValidated(bool $is_validated): static
    {
        $this->is_validated = $is_validated;

        return $this;
    }
}
