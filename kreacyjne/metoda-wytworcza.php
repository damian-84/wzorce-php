<?php

/* Metoda wytwórcza

Koncepcja
- wzorzec definuje interejs do tworzenia obiektów
- interfejs zawiera m.in metodę do tworzenia obiektów
- implementacje tego intefejsu odpowiadają za tworzenia obiektów konkretnej klasy

Przykład 
- potrzebujemy sposobu na produkowanie różnego typu pojazdów (samochodów, rowerów itp.)
- tworzymy interface "fabryka pojazdów"
- imprementacja interejsu to np. "fabryka samochodów" oraz "fabryka rowerów"

*/ 


// Implementacja




interface Vehicle
{
	public function getName();
}

/**
* Klasa Car
*/
class Car implements Vehicle
{
	protected $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

/**
* Klasa Bicycle
*/
class Bicycle implements Vehicle
{
	protected $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}

/**
* Interfejs fabryki
*/
interface VehicleFactory
{
	public function create($name);
}

/**
* Fabryka samochodow
*/
class CarFactory implements VehicleFactory
{
	public function create($name)
	{
		return new Car($name);
	}
}

/**
* Fabryka rowerow
*/
class BicycleFactory implements VehicleFactory
{
	public function create($name)
	{
		return new Bicycle($name);
	}
}

$carFactory = new CarFactory();
$car = $carFactory->create('Ford');
echo $car->getName();

?>