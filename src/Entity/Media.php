<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Path = null;
    /**
     * @var Refrence|null
     * @ORM\ManyToOne(targetEntity="Refrence",inversedBay="medias")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private ?Refrence $refrence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->Path;
    }

    public function setPath(string $Path): self
    {
        $this->Path = $Path;

        return $this;
    }
}
