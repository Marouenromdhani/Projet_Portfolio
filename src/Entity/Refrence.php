<?php

namespace App\Entity;

use App\Repository\RefrenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RefrenceRepository::class)]
class Refrence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Campany = null;
    #[ORM\Column(type: 'date_immutable')]
    private ?\DateTimeInterface $StartAt = null;

    #[ORM\Column]
    private ?\DateTimeInterface $EndedAt = null;
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Media" ,mappedBy="refrence",cascade={"persist"},orphanRemoval=true)
     */
    private Collection $media;

    /**
     * Reference constructer.
     */
     public function __construct()
{
    $this->media=new ArrayCollection();
}

    /**
     * @return Collection
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    /**
     * @param Collection $medias
     * @
     */
    public function setMedia(Collection $media): void
    {
        $this->media = $media;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getStartAt(): ?\DateTimeInterface
    {
        return $this->StartAt;
    }

    /**
     * @param \DateTimeInterface|null $StartAt
     */
    public function setStartAt(?\DateTimeInterface $StartAt): void
    {
        $this->StartAt = $StartAt;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->EndedAt;
    }

    /**
     * @param \DateTimeInterface|null $EndedAt
     */
    public function setEndedAt(?\DateTimeInterface $EndedAt): void
    {
        $this->EndedAt = $EndedAt;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getCampany(): ?string
    {
        return $this->Campany;
    }

    public function setCampany(string $Campany): self
    {
        $this->Campany = $Campany;

        return $this;
    }
public function addMedia(Media $media):void
{
     if (!$this->medias->contains($media)){
         $media->setRefrence($this);
         $this->medias->add($media);
     }
}
}
