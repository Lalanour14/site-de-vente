<?php

namespace App\entity;

class Fleur
{

    private string $Name;
    private float $basePrice;
    private string $description;
    private ?int $id = null;



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $Name 
     * @return self
     */
    public function setName(string $Name): self
    {
        $this->Name = $Name;
        return $this;
    }

    /**
     * @return float
     */
    public function getBasePrice(): float
    {
        return $this->BasePrice;
    }

    /**
     * @param float $BasePrice 
     * @return self
     */
    public function setBasePrice(float $BasePrice): self
    {
        $this->BasePrice = $BasePrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description 
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return 
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param  $id 
     * @return self
     */
    public function setId(?int $id): self
    {
        $this->id = $id;
        return $this;
    }
}