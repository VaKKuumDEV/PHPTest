<?php
class SlowDelivery extends Delivery{
	public const BASE_PRICE = 150;
	private $coefficient;
	private $date;
	private $error;
	
	public function __construct(string $baseUrl, string $sourceKladr, string $targetKladr, float $weight){
		parent::__construct($baseUrl, $sourceKladr, $targetKladr, $weight);
	}
	
	public function getCoefficient(): float{
		//как я понял, здесь должно происходить вычисление коэффициента
		$this->coefficient = mt_rand(100, 1000) / 100;
		return $this->coefficient;
	}
	
	public function getPrice(): float{
		return $this->getCoefficient() * self::BASE_PRICE;
	}
	
	public function getDate(): string{
		if(is_null($this->date)) $this->date = new DateTime();
		return $this->date->format('Y-m-d');
	}
	
	public function getError(): string{
		$this->error = '';
		return $this->error;
	}
	
	public function getJsonData(): array{
		//не знаю, зачем это нужно, но в задании был возврат json
		$data = [
			'coefficient' => $this->getCoefficient(),
			'date' => $this->getDate(),
			'error' => $this->getError(),
		];
		
		return $data;
	}
}
?>