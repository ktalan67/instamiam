<?php

namespace App\Entity;

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
}
