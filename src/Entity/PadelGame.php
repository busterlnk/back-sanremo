<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\PadelGameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PadelGameRepository::class)]
#[ApiResource]
class PadelGame
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'padelGames')]
    private ?Sport $sport = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $playerOne = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $playerTwo = null;

    #[ORM\Column(nullable: true)]
    private ?bool $individual = null;

    #[ORM\Column(nullable: true)]
    private ?int $p11s = null;

    #[ORM\Column(nullable: true)]
    private ?int $p12s = null;

    #[ORM\Column(nullable: true)]
    private ?int $p13s = null;

    #[ORM\Column(nullable: true)]
    private ?int $p1ps = null;

    #[ORM\Column(nullable: true)]
    private ?int $p21s = null;

    #[ORM\Column(nullable: true)]
    private ?int $p22s = null;

    #[ORM\Column(nullable: true)]
    private ?int $p23s = null;

    #[ORM\Column(nullable: true)]
    private ?int $p2ps = null;

    #[ORM\Column(nullable: true)]
    private ?int $saque = null;

    #[ORM\Column(nullable: true)]
    private ?string $mode = null;

    #[ORM\ManyToOne(inversedBy: 'padelGames')]
    private ?User $user = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $finishedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $winner = null;

    public function getPadelGame(): array{
        return [
            'id' => $this->id,
            'sport_id' => $this->sport,
            'user_id' => $this->user,
        ];
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): static
    {
        $this->sport = $sport;

        return $this;
    }

    public function getPlayerOne(): ?string
    {
        return $this->playerOne;
    }

    public function setPlayerOne(string $playerOne): static
    {
        $this->playerOne = $playerOne;

        return $this;
    }

    public function getPlayerTwo(): ?string
    {
        return $this->playerTwo;
    }

    public function setPlayerTwo(string $playerTwo): static
    {
        $this->playerTwo = $playerTwo;

        return $this;
    }

    public function isIndividual(): ?bool
    {
        return $this->individual;
    }

    public function setIndividual(bool $individual): static
    {
        $this->individual = $individual;

        return $this;
    }

    public function getP11s(): ?int
    {
        return $this->p11s;
    }

    public function setP11s(?int $p11s): static
    {
        $this->p11s = $p11s;

        return $this;
    }

    public function getP12s(): ?int
    {
        return $this->p12s;
    }

    public function setP12s(?int $p12s): static
    {
        $this->p12s = $p12s;

        return $this;
    }

    public function getP13s(): ?int
    {
        return $this->p13s;
    }

    public function setP13s(?int $p13s): static
    {
        $this->p13s = $p13s;

        return $this;
    }

    public function getP1ps(): ?int
    {
        return $this->p1ps;
    }

    public function setP1ps(?int $p1ps): static
    {
        $this->p1ps = $p1ps;

        return $this;
    }

    public function getP21s(): ?int
    {
        return $this->p21s;
    }

    public function setP21s(?int $p21s): static
    {
        $this->p21s = $p21s;

        return $this;
    }

    public function getP22s(): ?int
    {
        return $this->p22s;
    }

    public function setP22s(?int $p22s): static
    {
        $this->p22s = $p22s;

        return $this;
    }

    public function getP23s(): ?int
    {
        return $this->p23s;
    }

    public function setP23s(?int $p23s): static
    {
        $this->p23s = $p23s;

        return $this;
    }

    public function getP2ps(): ?int
    {
        return $this->p2ps;
    }

    public function setP2ps(?int $p2ps): static
    {
        $this->p2ps = $p2ps;

        return $this;
    }

    public function getSaque(): ?int
    {
        return $this->saque;
    }

    public function setSaque(?int $saque): static
    {
        $this->saque = $saque;

        return $this;
    }

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(?string $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeImmutable
    {
        return $this->finishedAt;
    }

    public function setFinishedAt(?\DateTimeImmutable $finishedAt): static
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(?string $winner): static
    {
        $this->winner = $winner;

        return $this;
    }
}
