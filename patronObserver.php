<?php
// Se usa el patrón Observer cuando un elemento quiere estar pendiente de otro(sujeto), 
// sin tener que estar comprobando de forma continua si ha cambiado o no. De tal forma que cuando
// el Sujeto cambie de estado, todos los elementos dependientes sean notificados automáticamente. 

// El objeto de datos(Sujeto), contiene atributos mediando los cuales cualquier objeto Oyente(observer)
// puede suscribirse a él Sujeto pasándole una referencia del oyente mismo. El sujeto mantiene así una
// lista de las referencias a sus observadores. Los observadores están obligados a implementar métodos
// mediante el Sujeto es capaz de notificar a sus suscriptores los cambios que sufre.

// Ideal para la construccion de consistencia entre clases relacionadas, pero con independencia(bajo acoplamiento). 

// Aplicar este patrón cuando una modificación en el estado de un objeto requiere cambios de otros, y 
// no se desea que se conozca el número de objetos que deben ser cambiados o cuando se quiere que un objeto 
// sea capaz de notificar a otros objetos sin hacer ninguna suposición acerca de los objetos notificados


// Clase Observer o Oyente
class Oyente {
	function __construct(string $nombre, Sujeto $sujeto){
		$this->nombre = $nombre;
		$sujeto->registrar($this);
	}

	function notificar(string $evento){
		echo $this->nombre . " evento recibido " . $evento . "\n";
	}

}

class Sujeto {
	function __construct(){
		$this->oyentes = array();
	}

	function registrar(Oyente $oyente){
		array_push($this->oyentes, $oyente);  
	}

	function suprimir(Oyente $oyente){
	    if(($clave = array_search($oyente, $this->oyentes, TRUE)) !== FALSE) {
	        unset($this->oyentes[$clave]);
	    }
	}

	function notificarOyentes(string $evento){
		foreach($this->oyentes as $oyente){
			$oyente->notificar($evento);
		}
	}
}

$sujeto = new Sujeto();
$oyenteA = new Oyente("<oyente A>", $sujeto);
$oyenteB = new Oyente("<oyente B>", $sujeto);
// Cada oyente es un observador
// El objeto Sujeto ahora tiene dos "oyentes" registrados
$sujeto->notificarOyentes("<evento 1>");
// La salida obtenida es :
// <oyente A> evento recibido <evento 1>
// <oyente B> evento recibido<evento 1>

?>