<?php

// El patrón Adapter también llamado envoltorio, se utiliza para que una clase
// pueda hacer uso de una interfaz a travéz de otra a la cuál el objeto puede utilizar

// Recomendable cuando:
// [!]se desea usar una clase existente, y su interfaz no sea igual a la necesitada.
// [!]cuando se desea crear una clase reutilizable que coopere con clases no relacionadas. 
//    Es decir, que las clases no tienen necesariamente interfaces compatibles.

class Envoltura {
	function __construct(){
		$guitarraElectrica = new GuitarraElectrica();

		$guitarraElectrica->activarGuitarra();
		$guitarraElectrica->desactivarGuitarra();

		$guitarraAcustica = new GuitarraElectroAcustica();

		$guitarraAcustica->activarGuitarra();
		$guitarraAcustica->desactivarGuitarra();
	} 
}

abstract class Guitarra {
	abstract function activarGuitarra();
	abstract function desactivarGuitarra();
}

class GuitarraElectrica extends Guitarra {

	function activarGuitarra(){
		echo "Tocando guitarra\n";
	}

	function desactivarGuitarra(){
		echo "Estoy cansado de tocar la guitarra\n";
	}
}

// Clase a adaptar
class GuitarraAcustica {
	
	function tocar(){
		echo "Tocando guitarra\n";
	}

	function soltar(){
		echo "Estoy cansado de tocar la guitarra\n";
	}
}

// Adaptamos/Envolvemos GuitarraAcustica en
// GuitarraElectroAcustica para adaptarse al modelo guitarra.
class GuitarraElectroAcustica extends Guitarra {
	public $acustica;

	function __construct(){
		$this->acustica = new GuitarraAcustica();
	}

	function activarGuitarra(){
		$this->acustica->tocar();
	}

	function desactivarGuitarra(){
		$this->acustica->soltar();
	}

}

new Envoltura();

?>