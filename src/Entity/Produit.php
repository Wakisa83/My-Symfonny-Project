<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $categorieId = null;

    #[ORM\Column]
    private ?int $Qteproduct = null;

    #[ORM\Column]
    private ?float $Price = null;

    #[ORM\Column]
    private ?float $discount = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 0, nullable: true)]
    private ?string $bigdes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCategorieId(): ?int
    {
        return $this->categorieId;
    }

    public function setCategorieId(int $categorieId): static
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    public function getQteproduct(): ?int
    {
        return $this->Qteproduct;
    }

    public function setQteproduct(int $Qteproduct): static
    {
        $this->Qteproduct = $Qteproduct;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): static
    {
        $this->Price = $Price;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): static
    {
        $this->discount = $discount;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getBigdes(): ?string
    {
        return $this->bigdes;
    }

    public function setBigdes(?string $bigdes): static
    {
        $this->bigdes = $bigdes;

        return $this;
    }
}
