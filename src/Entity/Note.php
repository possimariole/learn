<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Componen\Validator\Constraints as Assert; 

/**
 * @ORM\Entity(repositoryClass="App\Repository\NoteRepository")
 */
class Note
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $moyenne;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Inscription", inversedBy="notes")
     * Assert\Type(
     *     type="float",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $inscription;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Matiere", inversedBy="notes")
     */
    private $matiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoyenne(): ?float
    {
        return $this->moyenne;
    }

    public function setMoyenne(?float $moyenne): self
    {
        $this->moyenne = $moyenne;

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

    public function setMatiere(Matiere $matiere): self
    {
        $this->matiere = $matiere;
        return $this;
    }

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }
}
