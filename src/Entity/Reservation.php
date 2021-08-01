<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $time;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
    * @ORM\ManyToOne(targetEntity=Feedback::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $feedback;

   /**
    * @ORM\ManyToOne(targetEntity=CanceledReservation::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $canceledReservation;

    /**
     * @ORM\Column(type="date")
     */
    private $pickUpDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $pickUpTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bookReturn;

    /**
     * @ORM\Column(type="date")
     */
    private $returnDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $returnTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expireDateTime;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $origin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $destination;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $tva;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $paymentType;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPersons;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBriefCases;

    /**
     * @ORM\Column(type="integer")
     */
    private $volNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gamme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vehicle;

    /**
     * @ORM\Column(type="text")
     */
    private $vehiclePic;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbKm;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbHours;

    /**
     * @ORM\Column(type="time")
     */
    private $estimatedTime;

    /**
     * @ORM\Column(type="text")
     */
    private $extraInfos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $orderPath;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $done;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $way;

    /**
     * @ORM\Column(type="integer")
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $extras;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pickup_position;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pickoff_position;

    /**
     * @ORM\ManyToOne(targetEntity=Penality::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $yes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
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

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

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

    public function getFeedback(): ?Feedback
    {
        return $this->feedback;
    }

    public function setFeedback(?Feedback $feedback): self
    {
        $this->feedback = $feedback;

        return $this;
    }

    public function getCanceledReservation(): ?CanceledReservation
    {
        return $this->canceledReservation;
    }

    public function setCanceledReservation(?CanceledReservation $canceledReservation): self
    {
        // unset the owning side of the relation if necessary
        if ($canceledReservation === null && $this->canceledReservation !== null) {
            $this->canceledReservation->setReservationId(null);
        }

        // set the owning side of the relation if necessary
        if ($canceledReservation !== null && $canceledReservation->getReservationId() !== $this) {
            $canceledReservation->setReservationId($this);
        }

        $this->canceledReservation = $canceledReservation;

        return $this;
    }

    public function getPickUpDate(): ?\DateTimeInterface
    {
        return $this->pickUpDate;
    }

    public function setPickUpDate(\DateTimeInterface $pickUpDate): self
    {
        $this->pickUpDate = $pickUpDate;

        return $this;
    }

    public function getPickUpTime(): ?\DateTimeInterface
    {
        return $this->pickUpTime;
    }

    public function setPickUpTime(\DateTimeInterface $pickUpTime): self
    {
        $this->pickUpTime = $pickUpTime;

        return $this;
    }

    public function getBookReturn(): ?string
    {
        return $this->bookReturn;
    }

    public function setBookReturn(string $bookReturn): self
    {
        $this->bookReturn = $bookReturn;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    public function getReturnTime(): ?\DateTimeInterface
    {
        return $this->returnTime;
    }

    public function setReturnTime(\DateTimeInterface $returnTime): self
    {
        $this->returnTime = $returnTime;

        return $this;
    }

    public function getExpireDateTime(): ?\DateTimeInterface
    {
        return $this->expireDateTime;
    }

    public function setExpireDateTime(\DateTimeInterface $expireDateTime): self
    {
        $this->expireDateTime = $expireDateTime;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(string $origin): self
    {
        $this->origin = $origin;

        return $this;
    }

    public function getDestination(): ?string
    {
        return $this->destination;
    }

    public function setDestination(string $destination): self
    {
        $this->destination = $destination;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getPaymentType(): ?string
    {
        return $this->paymentType;
    }

    public function setPaymentType(string $paymentType): self
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    public function getNbPersons(): ?int
    {
        return $this->nbPersons;
    }

    public function setNbPersons(int $nbPersons): self
    {
        $this->nbPersons = $nbPersons;

        return $this;
    }

    public function getNbBriefCases(): ?int
    {
        return $this->nbBriefCases;
    }

    public function setNbBriefCases(int $nbBriefCases): self
    {
        $this->nbBriefCases = $nbBriefCases;

        return $this;
    }

    public function getVolNumber(): ?int
    {
        return $this->volNumber;
    }

    public function setVolNumber(int $volNumber): self
    {
        $this->volNumber = $volNumber;

        return $this;
    }

    public function getGamme(): ?string
    {
        return $this->gamme;
    }

    public function setGamme(string $gamme): self
    {
        $this->gamme = $gamme;

        return $this;
    }

    public function getVehicle(): ?string
    {
        return $this->vehicle;
    }

    public function setVehicle(string $vehicle): self
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    public function getVehiclePic(): ?string
    {
        return $this->vehiclePic;
    }

    public function setVehiclePic(string $vehiclePic): self
    {
        $this->vehiclePic = $vehiclePic;

        return $this;
    }

    public function getNbKm(): ?int
    {
        return $this->nbKm;
    }

    public function setNbKm(int $nbKm): self
    {
        $this->nbKm = $nbKm;

        return $this;
    }

    public function getNbHours(): ?int
    {
        return $this->nbHours;
    }

    public function setNbHours(int $nbHours): self
    {
        $this->nbHours = $nbHours;

        return $this;
    }

    public function getEstimatedTime(): ?\DateTimeInterface
    {
        return $this->estimatedTime;
    }

    public function setEstimatedTime(\DateTimeInterface $estimatedTime): self
    {
        $this->estimatedTime = $estimatedTime;

        return $this;
    }

    public function getExtraInfos(): ?string
    {
        return $this->extraInfos;
    }

    public function setExtraInfos(string $extraInfos): self
    {
        $this->extraInfos = $extraInfos;

        return $this;
    }

    public function getOrderPath(): ?string
    {
        return $this->orderPath;
    }

    public function setOrderPath(string $orderPath): self
    {
        $this->orderPath = $orderPath;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDone(): ?string
    {
        return $this->done;
    }

    public function setDone(string $done): self
    {
        $this->done = $done;

        return $this;
    }

    public function getWay(): ?string
    {
        return $this->way;
    }

    public function setWay(string $way): self
    {
        $this->way = $way;

        return $this;
    }

    public function getRef(): ?int
    {
        return $this->ref;
    }

    public function setRef(int $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getExtras(): ?string
    {
        return $this->extras;
    }

    public function setExtras(string $extras): self
    {
        $this->extras = $extras;

        return $this;
    }

    public function getPickupPosition(): ?string
    {
        return $this->pickup_position;
    }

    public function setPickupPosition(string $pickup_position): self
    {
        $this->pickup_position = $pickup_position;

        return $this;
    }

    public function getPickoffPosition(): ?string
    {
        return $this->pickoff_position;
    }

    public function setPickoffPosition(string $pickoff_position): self
    {
        $this->pickoff_position = $pickoff_position;

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
       // return $this->Name;
        // to show the id of the Category in the select
        return $this->id;
    }

    public function getYes(): ?Penality
    {
        return $this->yes;
    }

    public function setYes(Penality $yes): self
    {
        // set the owning side of the relation if necessary
        if ($yes->getReservation() !== $this) {
            $yes->setReservation($this);
        }

        $this->yes = $yes;

        return $this;
    }
}
