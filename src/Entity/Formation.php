<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Gradelevel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: 'date_immutable')]
    private ?\DateTimeInterface $StartAt = null;

    #[ORM\Column(type: 'date_immutable,nulabe:true')]
    private ?\DateTimeInterface $EndedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGradelevel(): ?string
    {
        return $this->Gradelevel;
    }

    public function setGradelevel(string $Gradelevel): self
    {
        $this->Gradelevel = $Gradelevel;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getStartAt(): ?\DateTimeImmutable
    {
        return $this->StartAt;
    }

    public function setStartAt(\DateTimeImmutable $StartAt): self
    {
        $this->StartAt = $StartAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeImmutable
    {
        return $this->EndedAt;
    }

    public function setEndedAt(\DateTimeImmutable $EndedAt): self
    {
        $this->EndedAt = $EndedAt;

        return $this;
    }
}
