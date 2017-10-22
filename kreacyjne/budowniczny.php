<?php

/* Builder - Budowniczy
    

Koncepcja
- jak uniknąć konstruktora z duż ilością parametrów
- kostruktor z dużą ilością parametrów to tzw. anty-wzorzec
- budowniczy umożliwia tworzenie obiektu etapami
- można łatwo tworzyć różne warianty obiektu

Przykład
- tworzymy UI aplikacji na Windowsa i Linuxa
- fabryka tworzy zestaw kontrolek (przycisk, menu itp)
- konkretne fabryki kontrolek dla właściwego systemu
- klient nie musi wiedzieć jakiej klasy użyć
*/


/*
// anty wzorzec (nieprzejrzysty konstruktor)
class Pizza
{
	protected $size;

	protected $tomato = false;
	protected $extraCheese = false;
	protected $bacon = false;

	public function __construct($size, $tomato, $extraCheese, $bacon) 
	{
		$this->size = $size;
		$this->tomato = $tomato;
		$this->extraCheese = $extraCheese;
		$this->bacon = $bacon;
	}

	public function getName()
	{
		return 'Pizza';
	}
}

$pizza = new Pizza('Small', true, false, false);
print_r($pizza);*/

class Pizza
{
	protected $size;

	protected $tomato = false;
	protected $extraCheese = false;
	protected $bacon = false;

	public function __construct($pizzaBuilder) 
	{
		$this->size = $pizzaBuilder->size;
		$this->tomato = $pizzaBuilder->tomato;
		$this->extraCheese = $pizzaBuilder->extraCheese;
		$this->bacon = $pizzaBuilder->bacon;
	}

	public function getName()
	{
		return 'Pizza';
	}
}

/**
* Budowniczy Pizzy
*/
class PizzaBuilder
{
	public $size;

	public $tomato = false;
	public $extraCheese = false;
	public $bacon = false;

	public function __construct($size)
	{
		$this->size = $size;
	}

	public function addTomato()
	{
		$this->tomato = true;
		return $this;
	}

	public function addExtraCheese()
	{
		$this->extraCheese = true;
		return $this;
	}

	public function addBacon()
	{
		$this->bacon = true;
		return $this;
	}

	public function build()
	{
		return new Pizza($this);
	}
}

$pizza = (new PizzaBuilder('Small'))
			->addTomato()
			->addExtraCheese()
			->build();
print_r($pizza);

?>