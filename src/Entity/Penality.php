<?php

namespace App\Entity;

use App\Repository\PenalityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PenalityRepository::class)
 */
class Penality
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="penality")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statue;

    /**
     * @ORM\ManyToOne(targetEntity=UserQuality::class, inversedBy="yes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_quality;

    /**
     * @ORM\OneToOne(targetEntity=Reservation::class, inversedBy="reservation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    

    public function getStatue(): ?string
    {
        return $this->statue;
    }

    public function setStatue(string $statue): self
    {
        $this->statue = $statue;

        return $this;
    }

    public function getUserQuality(): ?UserQuality
    {
        return $this->user_quality;
    }

    public function setUserQuality(?UserQuality $user_quality): self
    {
        $this->user_quality = $user_quality;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }
}
