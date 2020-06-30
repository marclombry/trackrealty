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


}
