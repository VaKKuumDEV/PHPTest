<?php
abstract class Delivery{
	private $base_url;
	protected $sourceKladr;
	protected $targetKladr;
	protected $weight;
	
	public function __construct(string $baseUrl, string $sourceKladr, string $targetKladr, float $weight){
		$this->base_url = $baseUrl;
		$this->sourceKladr = $sourceKladr;
		$this->targetKladr = $targetKladr;
		$this->weight = $weight;
	}
	
	public function getSourceKladr(): string{
		return $this->sourceKladr;
	}
	
	public function getTargetKladr(): string{
		return $this->targetKladr;
	}
	
	public function getWeight(): float{
		return $this->weight;
	}
	
	public function getJson(): array{
		$data = [
			'price' => $this->getPrice(),
			'date' => $this->getDate(),
			'error' => $this->getError(),
		];
		
		return $data;
	}
	
	abstract public function getJsonData(): array;
	abstract public function getPrice(): float;
	abstract public function getDate(): string;
	abstract public function getError(): string;
}
?>