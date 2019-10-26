<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\DiplomeRepository")
 */
class Diplome
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     * Assert\date
     * @var string A "y-m-d"formatted value
     */
    private $session;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enseignant", inversedBy="diplomes")
     * @Assert\NotBlank()
     */
    private $enseignant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSession(): ?int
    {
        return $this->session;
    }

    public function setSession(int $session): self
    {
        $this->session = $session;

        return $this;
    }

    public function setEnseignant(Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;
        return $this;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }
}
