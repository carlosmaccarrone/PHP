<?php

class Usuario {
	protected $nombre;	// Se definen protected para que se puedan heredar 
	protected $edad;	// y no puedan ser modificadas fuera de la clase o sin un metodo set
	public $vive;

	function __construct($_nombre, $_edad, $_vive){
		$this->nombre = $_nombre;
		$this->edad = $_edad;
		$this->vive = $_vive;
	}

	function getCedula(){
		if (is_bool($this->vive) === true) $estado = ($this->vive == 1) ? "Esta vivo" : "Fallecio"; 
		else $estado = "Sin definir";

		return "Usuario: ".$this->nombre."\t".$this->edad."\t".$estado;
	}

	function getEstado(){
		return isset($this->vive) ? 'Esta vivo': 'Esta muerto';
	}
}

class Paciente extends Usuario {

	function getCedula(){
		if (is_bool($this->vive) === true) $estado = ($this->vive == 1) ? "Curado" : "Enfermo"; 
		else $estado = "Sin definir";

		return "Paciente: ".$this->nombre."\t".$this->edad."\t".$estado;
	}
}

class Auto {
	private $nDePatente;
	private $anioFabricacion;

	function __construct($_nDePatente, $_anioFabricacion){
		$this->nDePatente = $_nDePatente;
		$this->anioFabricacion = $_anioFabricacion;
	}

	function getCedula(){
		$estado = ($this->anioFabricacion < 1952) ? "Fuera de circulacion" : "En circulacion"; 
		return "Auto: ".$this->nDePatente."\t".$this->anioFabricacion."\t".$estado;
	}
}


class Scheduler {

	public $coleccion = array();

	function instanciar($_Clase, $_nombre, $_edad, $_vive){
		$instancia = new $_Clase($_nombre, $_edad, $_vive);
		array_push($this->coleccion, $instancia);
		unset($instancia);
	}

	function imprimir(){
		foreach ($this->coleccion as $objeto) {
			echo $objeto->getCedula()."\r\n";
		}
	}
}

$scheduler = new Scheduler();
$scheduler->instanciar("Usuario", "Chiche Gelblung", 75, false);
$scheduler->instanciar("Paciente", "Rene Favaloro", 96, true);
$scheduler->instanciar("Auto", "Ford T", 1924, null);

$scheduler->imprimir();

/* Este programa muestra como manipular en php clases, polimorfismos, herencias y colecciones */

?>
