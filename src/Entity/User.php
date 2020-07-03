<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *  fields={"email"},
 *  message="cette email est deja utilisé"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8", minMessage="Votre mot de passe doit faire au moin 8 charactère")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password",message="Votre mot de passe est différent")
     *
     * 
     */
    private $confirmPassword;

    /**
     * @ORM\OneToMany(targetEntity=Realty::class, mappedBy="user")
     */
    private $realties;

    public function __construct()
    {
        $this->realties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->password;
    }

    public function setConfirmPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(){

    }

    public function getSalt(){}

    public function getRoles() {
        return ['ROLE_USER'];
    }

    /**
     * @return Collection|Realty[]
     */
    public function getRealties(): Collection
    {
        return $this->realties;
    }

    public function addRealty(Realty $realty): self
    {
        if (!$this->realties->contains($realty)) {
            $this->realties[] = $realty;
            $realty->setUser($this);
        }

        return $this;
    }

    public function removeRealty(Realty $realty): self
    {
        if ($this->realties->contains($realty)) {
            $this->realties->removeElement($realty);
            // set the owning side to null (unless already changed)
            if ($realty->getUser() === $this) {
                $realty->setUser(null);
            }
        }

        return $this;
    }
}
