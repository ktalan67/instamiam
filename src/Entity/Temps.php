<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TempsRepository")
 */
class Temps
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $tps_prepa;

    /**
     * @ORM\Column(type="integer")
     */
    private $tps_cuisson;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Recette", mappedBy="temps")
     */
    private $recettes;

    public function __construct()
    {
        $this->recettes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTpsPrepa(): ?int
    {
        return $this->tps_prepa;
    }

    public function setTpsPrepa(int $tps_prepa): self
    {
        $this->tps_prepa = $tps_prepa;

        return $this;
    }

    public function getTpsCuisson(): ?int
    {
        return $this->tps_cuisson;
    }

    public function setTpsCuisson(int $tps_cuisson): self
    {
        $this->tps_cuisson = $tps_cuisson;

        return $this;
    }

    /**
     * @return Collection|Recette[]
     */
    public function getRecettes(): Collection
    {
        return $this->recettes;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recettes->contains($recette)) {
            $this->recettes[] = $recette;
            $recette->setTemps($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recettes->contains($recette)) {
            $this->recettes->removeElement($recette);
            // set the owning side to null (unless already changed)
            if ($recette->getTemps() === $this) {
                $recette->setTemps(null);
            }
        }

        return $this;
    }
}
