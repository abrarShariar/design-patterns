<?php

interface CarService {
	public function getCost();
	public function getDescription();
}

class BasicInspection implements CarService {

	public function getCost() 
	{
		return 10;
	}

	public function getDescription()
	{
		return 'Basic Inspection';
	}
}

class OilChange implements CarService {

	protected $carService;

	function __construct(CarService $carService)
	{
		$this->carService = $carService;
	}

	public function getCost()
	{
		return 20 + $this->carService->getCost();
	}

	public function getDescription()
	{
		return $this->carService->getDescription() . ", and oil change";
	}
}

class TireChange implements CarService {

	protected $carService;

	function __construct(CarService $carService)
	{
		$this->carService = $carService;
	}

	public function getCost()
	{
		return 30 + $this->carService->getCost();
	}

	public function getDescription()
	{
		return $this->carService->getDescription()->getDescription . ", and tire change";	
	}
}

echo (new TireChange((new OilChange(new BasicInspection()))))->getCost();

$service = new OilChange(new BasicInspection());
echo $service->getDescription();