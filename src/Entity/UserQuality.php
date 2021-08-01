<?php

namespace App\Entity;

use App\Repository\UserQualityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserQualityRepository::class)
 */
class UserQuality
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
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity=Penality::class, mappedBy="user_quality", orphanRemoval=true)
     */
    private $yes; //penalities cad

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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
    public function __toString(){
        // to show the name of the Category in the select
        //return $this->Name;
        // to show the id of the Category in the select
        return $this->id;
    }

    /**
     * @return Collection|Penality[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Penality $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setUserQuality($this);
        }

        return $this;
    }

    public function removeYe(Penality $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getUserQuality() === $this) {
                $ye->setUserQuality(null);
            }
        }

        return $this;
    }
}
