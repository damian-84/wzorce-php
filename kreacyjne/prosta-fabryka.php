<?php 

/*
Simply factory - prosta fabryka

Koncepcja:
- fabryka do produkcji obiektów
- jeśli potrzbujemu np. telewizora to nie produkuję go sam tylko biorę gotowy z fabryki
- prosta fabryka generuje obiekt dla klienta bez eksponowania logiki tworzenia obiektu klientowi

Przykład
- chcę stworzyć obiekt klasy Car (samochód)
- nie muszę znać implementacji tej klasy
- wystarczy, że użyję właściwej metody fabryki samochodów, która zapewni mi samochód
- jako klient nie muszę wiedzieć jakiej klasy jest obiekt samochodu

Uwagi
- jeden z najprostszych worców
- niektórzy dyskutują na tym czy Prosta fabryka jest wzorcem projektowym

*/


//IMPLEMENTACJA

/**
* klasa Vehicle
*/
class Vehicle
{
	protected $name;

	public function getName()
	{
		return $this->name;
	}		
}

/**
* Klasa Car
*/
class Car extends Vehicle
{
	
	function __construct($name)
	{
		$this->name = $name;
	}
}

/*$car =new Car('Ford');
echo $car->getName();*/

/**
* Fabryka samochodow
*/
class CarFactory
{

	public static function createCar($name)
	{
		return new Car($name);
	}
	
}

$car = CarFactory::createCar('Ford');
echo $car->getName();


 ?>