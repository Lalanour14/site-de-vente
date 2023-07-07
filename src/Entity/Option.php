<?php
namespace App\Entity;

class Option
{
    private string $label;
    private ?float $price;
    private ?int $id = null;

	public function __construct(string $label, float $price, int $id)
    {
        $this->label = $label;
        $this->price = $price;
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
	 * @return 
	 */
	public function getPrice(): ?float {
		return $this->price;
	}
	
	/**
	 * @param  $price 
	 * @return self
	 */
	public function setPrice(?float $price): self {
		$this->price = $price;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
	}
}