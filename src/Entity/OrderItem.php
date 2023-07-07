<?php
namespace App\Entity;

class OrderItem
{
    private int $quantity;
    private float $itemPrice;
    private ?int $idOrder = null;
    private ?int $idFleur = null;
    private ?int $id = null;

	public function __construct(int $quantity, float $itemPrice, int $idOrder, int $idFleur, int $id)
    {
        $this->quantity = $quantity;
        $this->itemPrice = $itemPrice;
        $this->idOrder = $idOrder;
        $this->idFleur = $idFleur;
        $this->id = $id;
    }

	/**
	 * @return int
	 */
	public function getQuantity(): int {
		return $this->quantity;
	}
	
	/**
	 * @param int $quantity 
	 * @return self
	 */
	public function setQuantity(int $quantity): self {
		$this->quantity = $quantity;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getItemPrice(): float {
		return $this->itemPrice;
	}
	
	/**
	 * @param float $itemPrice 
	 * @return self
	 */
	public function setItemPrice(float $itemPrice): self {
		$this->itemPrice = $itemPrice;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getIdOrder(): ?int {
		return $this->idOrder;
	}
	
	/**
	 * @param  $idOrder 
	 * @return self
	 */
	public function setIdOrder(?int $idOrder): self {
		$this->idOrder = $idOrder;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getIdFleur(): ?int {
		return $this->idFleur;
	}
	
	/**
	 * @param  $idFleur 
	 * @return self
	 */
	public function setIdFleur(?int $idFleur): self {
		$this->idFleur = $idFleur;
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