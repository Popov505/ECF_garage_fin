<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
#[UniqueEntity(fields: 'email', message: "Vous avez déjà laissé un message. Merci d'attendre que votre demande soit traitée.")]
class Contacts
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
    private ?string $firstname = null;

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
        pattern:'/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/',
        message:"Vous avez entré des caractères non autorisés")]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 2,
        minMessage: 'Veuillez entrer plus de 1 caractère',
        max: 30, 
        maxMessage: 'Veuillez entrer moins de 31 caractères')]
    #[Assert\Regex(
        pattern:'/^[-+0-9\s]+$/',
        message:"Vous avez entré des caractères non autorisés")]
    private ?string $phone = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 2,
        minMessage: 'Veuillez entrer plus de 1 caractère',
        max: 30, 
        maxMessage: 'Veuillez entrer moins de 31 caractères')]
    #[Assert\Regex(
        pattern:"/^[-',;:.?!0-9a-zA-ZÀ-ÿ\s]+$/",
        message:"Vous avez entré des caractères non autorisés")]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\Length(
        min: 2,
        minMessage: 'Veuillez entrer plus de 1 caractère',
        max: 255, 
        maxMessage: 'Veuillez entrer moins de 256 caractères')]
    #[Assert\Regex(
        pattern:"/^[-',;:.?!0-9a-zA-ZÀ-ÿ\s]+$/",
        message:"Vous avez entré des caractères non autorisés")]
    private ?string $message = null;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
