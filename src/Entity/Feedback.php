<?php

namespace App\Entity;

use App\Repository\FeedbackRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FeedbackRepository::class)
 * @ORM\Table(name="`Feedback`")
 */
class Feedback
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

   

     /**
     * @ORM\OneToOne(targetEntity=Reservation::class, inversedBy="reservation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ponctualite;

    public function getId(): ?int
    {
        return $this->id;
    }

    
    
    public function __toString(){
        // to show the name of the Category in the select
        //return $this->Name;
        // to show the id of the Category in the select
        return $this->id;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        // unset the owning side of the relation if necessary
        if ($reservation === null && $this->reservation !== null) {
            $this->reservation->setFeedback(null);
        }

        // set the owning side of the relation if necessary
        if ($reservation !== null && $reservation->getFeedback() !== $this) {
            $reservation->setFeedback($this);
        }

        $this->reservation = $reservation;

        return $this;
    }

    public function getPonctualite(): ?string
    {
        return $this->ponctualite;
    }

    public function setPonctualite(string $ponctualite): self
    {
        $this->ponctualite = $ponctualite;

        return $this;
    }
}
