<?php

namespace App\Entity;

use App\Repository\RealtyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RealtyRepository::class)
 */
class Realty
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $state;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price_sell;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price_buy;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price_rent;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $nb_room;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="realties")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Tenant::class, mappedBy="realty")
     */
    private $tenant;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $postal_code;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    public function __construct()
    {
        $this->tenant = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getPriceSell(): ?float
    {
        return $this->price_sell;
    }

    public function setPriceSell(?float $price_sell): self
    {
        $this->price_sell = $price_sell;

        return $this;
    }

    public function getPriceBuy(): ?float
    {
        return $this->price_buy;
    }

    public function setPriceBuy(?float $price_buy): self
    {
        $this->price_buy = $price_buy;

        return $this;
    }

    public function getPriceRent(): ?float
    {
        return $this->price_rent;
    }

    public function setPriceRent(?float $price_rent): self
    {
        $this->price_rent = $price_rent;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(?float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getNbRoom(): ?float
    {
        return $this->nb_room;
    }

    public function setNbRoom(?float $nb_room): self
    {
        $this->nb_room = $nb_room;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Tenant[]
     */
    public function getTenant(): Collection
    {
        return $this->tenant;
    }

    public function addTenant(Tenant $tenant): self
    {
        if (!$this->tenant->contains($tenant)) {
            $this->tenant[] = $tenant;
            $tenant->setRealty($this);
        }

        return $this;
    }

    public function removeTenant(Tenant $tenant): self
    {
        if ($this->tenant->contains($tenant)) {
            $this->tenant->removeElement($tenant);
            // set the owning side to null (unless already changed)
            if ($tenant->getRealty() === $this) {
                $tenant->setRealty(null);
            }
        }

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(?float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(?float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }


}
