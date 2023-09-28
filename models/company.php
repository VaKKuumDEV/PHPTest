<?php
class Company{
	private $name;
	private $deliveries = [];
	
	public function __construct(string $name){
		$this->name = $name;
	}
	
	public function getName(): string{
		return $this->name;
	}
	
	public function getDeliveries(): array{
		return $this->deliveries;
	}
	
	public function addDelivery(Delivery $del): void{
		$this->deliveries[] = $del;
	}
}
?>