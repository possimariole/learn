<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaiementRepository")
 */
class Paiement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $somme;

    /**
     * @ORM\Column(type="date")
     * Assert\Date
     * @var string A "Y-m-d" formatted value
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     */
    private $mode;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Inscription", inversedBy="paiements")
     * Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $inscription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSomme(): ?float
    {
        return $this->somme;
    }

    public function setSomme(float $somme): self
    {
        $this->somme = $somme;

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

    public function getMode(): ?string
    {
        return $this->mode;
    }

    public function setMode(string $mode): self
    {
        $this->mode = $mode;

        return $this;
    }

    public function setInscription(Inscription $inscription): self
    {
        $this->inscription = $inscription;
        return $this;
    }

    public function getInscription(): ?Inscription
    {
        return $this->inscription;
    }
}
