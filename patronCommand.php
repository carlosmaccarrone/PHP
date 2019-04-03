<?php

// El patrón Command permite solicitar una operación a un objeto sin conocer realmente el 
// contenido de esta operación, ni el receptor real de la misma. Para ello se encapsula 
// la petición como un objeto, con lo que además facilita la parametrización de los métodos. 


// [!]Encapsula un mensaje como un objeto, con lo que permite gestionar colas o registro 
//    de mensaje y deshacer operaciones.
// [!]Soportar restaurar el estado a partir de un momento dado.
// [!]Ofrecer una interfaz común que permita invocar las acciones de forma uniforme y 
//    extender el sistema con nuevas acciones de forma más sencilla.
// [!]Implementar CallBacks, especificando que órdenes queremos que se ejecuten en 
//    ciertas situaciones de otras órdenes. Es decir, un parámetro de una orden puede 
//    ser otra orden a ejecutar.


// Clase invocadora
class Pulsador {
	private $objMoverArriba;
	private $objMoverAbajo;

	function Pulsador(Command $objMoverArriba_, Command $objMoverAbajo_){
		$this->objMoverArriba = $objMoverArriba_;
		$this->objMoverAbajo = $objMoverAbajo_;
	}

	function moverArriba(){
		$this->objMoverArriba->correr();
	}

	function moverAbajo(){
		$this->objMoverAbajo->correr();
	}
}

// Clase receptora
class Luz {
	function Luz(){}

	function encender(){
		echo "La luz está encendida\n";
	}

	function apagar(){
		echo "La luz está apagada\n";
	}
}

// Interfaz command
interface Command {
	function correr();
}

// El comando para encender la luz
class MoverPulsadorArriba implements Command {
	private $laLuz;

	function MoverPulsadorArriba(Luz $luz){
		$this->laLuz = $luz;
	}

	function correr(){
		$this->laLuz->encender();
	}
}

// El comando para apagar la luz
class MoverPulsadorAbajo implements Command {
	private $laLuz;

	function MoverPulsadorAbajo(Luz $luz){
		$this->laLuz = $luz;
	}

	function correr(){
		$this->laLuz->apagar();
	}
}

class Cliente {
	public $lampara;
	public $moverArriba;
	public $moverAbajo;
	public $pulsador;

	function __construct(){
		$this->lampara = new Luz();
		$this->moverArriba = new MoverPulsadorArriba($this->lampara);
		$this->moverAbajo = new MoverPulsadorAbajo($this->lampara);

// Una crítica de la aplicación de éste ejemplo es que no modeliza verdaderamente 
// un circuito eléctrico. Un pulsador eléctrico es tonto. Un verdadero interruptor 
// binario solo conoce si está en una posición u otra. No sabe nada o no tiene relación 
// directa con las tareas que se le podrían asignar en un circuito. El interruptor 
// simplemente publica un evento de su estado actual (encendido o apagado). El circuito 
// debería entonces contener una Máquina de estados que gestione los estados en momentos 
// dados (escuchando los eventos del pulsador) para acomodar apropiadamente complejos 
// circuitos con tareas e interruptores. Cada tarea es condicional a un estado específico 
// del circuito (no directamente a un pulsador). En conclusión, el pulsador no debería 
// ser consciente de los detalles de la lámpara. 
		$this->pulsador = new Pulsador($this->moverArriba, $this->moverAbajo);	
	}

	function proceder(string $args){
		if(!stristr($args, "ON") && !stristr($args, "OFF")){
			echo "Argumentos ON o OFF son requeridos\n";
			return;
		}

		switch ((string)$args) {
		    case "ON":
		        $this->pulsador->moverArriba();
		        break;
		    case "OFF":
		        $this->pulsador->moverAbajo();
		        break;
		    default:
		        echo "Argumentos ON o OFF son requeridos\n";
		        return;
		}
	}
}

$cliente = new Cliente;
$cliente->proceder("OFF");
$cliente->proceder("ON");
$cliente->proceder("OFF");

?>