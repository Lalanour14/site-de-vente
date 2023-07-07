<?php

namespace App\entity;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;


class Fleur
{
    private string $label;
    private float $basePrice;
    private string $description;
    private string $picture;
    private ?int $id;



public function __construct(string $label,
float $basePrice,
string $description,
string $picture,
?int $id

) {
    $this->label = $label;
    $this->basePrice = $basePrice;
    $this->description = $description;
    $this->picture = $picture;
    $this->id = $id;

}




	/**
	 * @return string
	 */
	public function getLabel(): string {
		return $this->label;
	}
	
	/**
	 * @param string $label 
	 * @return self
	 */
	public function setLabel(string $label): self {
		$this->label = $label;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getBasePrice(): float {
		return $this->basePrice;
	}
	
	/**
	 * @param float $basePrice 
	 * @return self
	 */
	public function setBasePrice(float $basePrice): self {
		$this->basePrice = $basePrice;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getPicture(): string {
		return $this->picture;
	}
	
	/**
	 * @param string $picture 
	 * @return self
	 */
	public function setPicture(string $picture): self {
		$this->picture = $picture;
		return $this;
	}
	
	/**
	 * @return int|null
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param int|null $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
}
