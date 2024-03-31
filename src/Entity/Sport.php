<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SportRepository::class)]
#[ApiResource]
class Sport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'sport', targetEntity: PadelGame::class)]
    private Collection $padelGame;

    public function __construct()
    {
        $this->padelGame = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, PadelGame>
     */
    public function getGame(): Collection
    {
        return $this->padelGame;
    }

    public function addGame(PadelGame $padelGame): static
    {
        if (!$this->padelGame->contains($padelGame)) {
            $this->padelGame->add($padelGame);
            $padelGame->setSport($this);
        }

        return $this;
    }

    public function removeGame(PadelGame $padelGame): static
    {
        if ($this->padelGame->removeElement($padelGame)) {
            // set the owning side to null (unless already changed)
            if ($padelGame->getSport() === $this) {
                $padelGame->setSport(null);
            }
        }

        return $this;
    }
}
