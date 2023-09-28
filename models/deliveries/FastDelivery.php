<?php
class FastDelivery extends Delivery{
	private $price;
	private $period;
	private $error;
	
	public function __construct(string $baseUrl, string $sourceKladr, string $targetKladr, float $weight){
		parent::__construct($baseUrl, $sourceKladr, $targetKladr, $weight);
	}
	
	public function getPrice(): float{
		//как я понял, здесь должно происходить вычисление цены
		$this->price = mt_rand(1000, 10000) / 100;
		return $this->price;
	}
	
	public function getPeriod(): int{
		$this->period = mt_rand(1, 5);
		return $this->period;
	}
	
	public function getDate(): string{
		$date = new DateTime();
		$date = $date->add(new DateInterval('P' . $this->getPeriod() . 'D'));
		return $date->format('Y-m-d');
	}
	
	public function getError(): string{
		$this->error = '';
		return $this->error;
	}
	
	public function getJsonData(): array{
		//не знаю, зачем это нужно, но в задании был возврат json
		$data = [
			'price' => $this->getPrice(),
			'period' => $this->getPeriod(),
			'error' => $this->getError(),
		];
		
		return $data;
	}
}
?>