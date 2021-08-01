<?php

namespace App\Entity;

use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
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
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

   

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    
    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zone;

    /**
     * @ORM\Column(type="integer")
     */
    private $rib;

    /**
     * @ORM\OneToMany(targetEntity=Penality::class, mappedBy="company", orphanRemoval=true)
     */
    private $penalities;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="company", orphanRemoval=true)
     */
    private $reservations;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberSiren;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberTVA;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $juridicForm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $representantLegal;

    public function __construct()
    {
        $this->penalities = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getNumberSiren(): ?int
    {
        return $this->numberSiren;
    }

    public function setNumberSiren(int $numberSiren): self
    {
        $this->numberSiren = $numberSiren;

        return $this;
    }

    public function getNumberTva(): ?int
    {
        return $this->numberTVA;
    }

    public function setNumberTva(int $numberTVA): self
    {
        $this->numberTVA = $numberTVA;

        return $this;
    }

    public function getJuridicForm(): ?string
    {
        return $this->juridicForm;
    }

    public function setJuridicForm(string $juridicForm): self
    {
        $this->juridicForm = $juridicForm;

        return $this;
    }

    public function getRepresentantLegal(): ?string
    {
        return $this->representantLegal;
    }

    public function setRepresentantLegal(string $representantLegal): self
    {
        $this->representantLegal = $representantLegal;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getRib(): ?int
    {
        return $this->rib;
    }

    public function setRib(int $rib): self
    {
        $this->rib = $rib;

        return $this;
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        // to show the name of the Category in the select
        //return $this->Name;
        // to show the id of the Category in the select
        return $this->id;
    }


    /**
     * @return Collection|Penality[]
     */
    public function getPenalities(): Collection
    {
        return $this->penalities;
    }

    public function addPenality(Penality $penality): self
    {
        if (!$this->penalities->contains($penality)) {
            $this->penalities[] = $penality;
            $penality->setCompany($this);
        }

        return $this;
    }

    public function removePenality(Penality $penality): self
    {
        if ($this->penalities->removeElement($penality)) {
            // set the owning side to null (unless already changed)
            if ($penality->getCompany() === $this) {
                $penality->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setCompany($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getCompany() === $this) {
                $reservation->setCompany(null);
            }
        }

        return $this;
    }
}
