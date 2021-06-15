<?php

namespace App\Entity;

use App\Repository\NationalityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NationalityRepository::class)
 */
class Nationality
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $countryname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $flag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountryname(): ?string
    {
        return $this->countryname;
    }

    public function setCountryname(string $countryname): self
    {
        $this->countryname = $countryname;

        return $this;
    }

    public function getFlag(): ?string
    {
        return $this->flag;
    }

    public function setFlag(string $flag): self
    {
        $this->flag = $flag;

        return $this;
    }

    public function __toString()
    {
        return $this->countryname;
    }


}
