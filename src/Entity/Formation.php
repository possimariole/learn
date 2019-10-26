<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
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
     * @ORM\Column(type="float")
     * @Assert\Type("float")
     */
    private $montantInscription;

    /**
     * @ORM\Column(type="float")
     */
    private $montantDossier;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Specialite", mappedBy="formation")
     * @Assert\NotBlank()
     */
    private $specialites;

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

    public function getMontantInscription(): ?float
    {
        return $this->montantInscription;
    }

    public function setMontantInscription(float $montantInscription): self
    {
        $this->montantInscription = $montantInscription;

        return $this;
    }

    public function getMontantDossier(): ?float
    {
        return $this->montantDossier;
    }

    public function setMontantDossier(float $montantDossier): self
    {
        $this->montantDossier = $montantDossier;

        return $this;
    }

    public function addFormation(Formation $formation): self 
    {
        if(!$this->specialites->contains($specialite))
        {
            $this->specialites[] = $specialite;
            $specialites->setFormation($this);
        }
        return $this;
    }
    /**
     * @return collection\specialites[]
     */
    public function getSpecialite(): Collection
    {
        return $this->specialites;
    }

    public function removeElement(Specialite $specialite): self
    {
        if($this->specialites->contains(specialilte))
        {
            $this->specialites->removeElement($specialite);
                if($specialite->getFormation() === $this)
                {
                    $specialite->setFormation($this);
                }
        }
        return $this;
    }
}
