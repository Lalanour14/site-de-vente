<?php
namespace App\Entity;

class OrderItemOption
{
    private ?int $idOrderItem = null;
    private ?int $idOption = null;
    private ?int $id = null;

	public function __construct(int $idOrderItem, int $idOption, int $id)
    {
        $this->idOrderItem = $idOrderItem;
        $this->idOption = $idOption;
        $this->id = $id;
    }

	/**
	 * @return 
	 */
	public function getIdOrderItem(): ?int {
		return $this->idOrderItem;
	}
	
	/**
	 * @param  $idOrderItem 
	 * @return self
	 */
	public function setIdOrderItem(?int $idOrderItem): self {
		$this->idOrderItem = $idOrderItem;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getIdOption(): ?int {
		return $this->idOption;
	}
	
	/**
	 * @param  $idOption 
	 * @return self
	 */
	public function setIdOption(?int $idOption): self {
		$this->idOption = $idOption;
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