<?php

namespace App\Entity;

use App\Repository\TypeStateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeStateRepository")
 * @ORM\Table(name="tbltypeState")
 */
class TypeState
{
/**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="idTypeState", type="integer")
     */
    private $idTypeState;

    /**
     * @ORM\Column(name="dsAbbreviation", type="string", length=2)
     */
    private $dsAbbreviation;

    /**
     * @ORM\Column(name="dsType", type="string", length=100)
     */
    private $dsType;

    public function getIdTypeState(): ?int
    {
        return $this->idTypeState;
    }

    public function getDsAbbreviation(): ?string
    {
        return $this->dsAbbreviation;
    }

    public function setDsAbbreviation(string $dsAbbreviation): self
    {
        $this->dsAbbreviation = $dsAbbreviation;

        return $this;
    }

    public function getDsType(): ?string
    {
        return $this->dsType;
    }

    public function setDsType(string $dsType): self
    {
        $this->dsType = $dsType;

        return $this;
    }
}
