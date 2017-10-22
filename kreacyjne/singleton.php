<?php

/* Singleton
    

Koncepcja
- ograniczamy możliwośc tworzenia obiektów klasy tylko do jednej instancji
- potrzebny jest "prototyp"
- przydatny wtedy gdy potrzebny jest jeden obiekt koortynujący działania w całym systemie

Przykład
- potrzebujemy obiektu połączenia z bazą danych
- różne komponety aplikacji korzystają z tej samej instancji połączenia aby za każdym razem nie tworzyć nowego połączenia

Co trzeba wiedzieć
- Singleton bywa nadużywany
- niektórzy uważają go za anty-wzorzec
- wprowadza globalny stan do aplikacji
- trudności w testowaniu aplikacji

Jak zaimplementować
- statyczny składnik przechowujący instancje
- prywatny konstuktor
- statyczna publiczna metoda zapewniająca globalny dostęp do instancji

*/




final class DbConnection
{
	private static $instance;

	private function __construct()
	{

	}

	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __clone()
	{

	}
}

$db1 = DbConnection::getInstance();
$db2 = DbConnection::getInstance();
print_r($db1 === $db2);

?>