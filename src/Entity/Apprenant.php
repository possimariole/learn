<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ApprenantRepository")
 */
class Apprenant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message = "ce champ est obligatoire")
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     * @Assert\Blank()
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     * Assert\Date
     * @var string A "Y-m-d" formatted value
     */
    private $dateNaiss;

    /**
     * @ORM\Column(type="text")
     * @Assert\Country
     */
    private $pays;

    /**
     * @ORM\Column(type="text")
     */
    private $ville;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Email(
     * message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true)
     */
    private $adresseMail;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(min = 4)
     */
    private $numTel;

    /**
     * @ORM\Column(type="string", length=1)
     * @Assert\NotBlank()
     */
    private $sexe;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Inscription", mappedBy="apprenant")
     * @Assert\Type("float")
     */
    private $inscriptions;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaiss(): ?\DateTimeInterface
    {
        return $this->dateNaiss;
    }

    public function setDateNaiss(\DateTimeInterface $dateNaiss): self
    {
        $this->dateNaiss = $dateNaiss;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

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

    public function getAdresseMail(): ?string
    {
        return $this->adresseMail;
    }

    public function setAdresseMail(?string $adresseMail): self
    {
        $this->adresseMail = $adresseMail;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->numTel;
    }

    public function setNumTel(int $numTel): self
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function addInscription(Inscription $inscription)
    {
        if(!$this->inscriptions->contains($inscription))
        {
            $this->inscriptions[] = $inscription;
            $inscription->setApprenant($this);
        }
        return $this;
    }
    /**
     * @return collection\inscriptions;
     */
    public function getInscription(): Collection
    {
        return $this->inscriptions;
    }

    public function removeElement(Inscription $inscription): self
    {
        if($this->inscritions->contains($inscription))
        {
            $this->inscriptions->removeElement($inscription);
            if($inscription->getApprenant() === $this); 
            {
                $inscription->setApprenant(null);
            }
        }
        return $this;
    }
}
