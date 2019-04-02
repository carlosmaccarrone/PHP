<?php
// El patrón Composite sirve para fabricar objetos generando una estructura de 
// composición recursiva de árbol. Esto simplifica el tratamiento de los  
// objetos creados, ya que al poseer todos ellos una interfaz común, se tratan todos 
// de la misma manera. Dependiendo de la implementación, pueden aplicarse procedimientos 
// al total o una de las partes de la estructura compuesta como si de un nodo final 
// se tratara

// [!]Representar jerarquías de objetos
// [!]Ignorar las diferencias entre composiciones de grupos de objetos y objetos individuales
// [!]Tratar a todos los objetos dentro de la composición de manera uniforme.
// [!]Por lo tanto reducir los condicionales en el código del cliente.
// [!]Escribir nuevas clases de componentes que trabajen de forma automática con 
// 	  estructuras existentes y código del cliente sin necesidad de cambios extra.
// [!]Componer objetos de manera recursiva utilizando programación orientada a objetos.

class Cliente {
	function __construct(){

		$root = new Nodo('root');

		$nodo_1 = new Nodo("nodo_1");
		$nodo_1_1 = new Nodo("nodo_1_1");
		$hoja_1_2 = new Hoja("hoja_1_2"); 
		$nodo_1_1_1 = new Nodo("nodo_1_1_1");
		$hoja_1_1_2 = new Hoja("hoja_1_1_2");

		$hoja_2 = new Hoja("hoja_2");
		$nodo_3 = new Nodo("nodo_3");
		$hoja_3_1 = new Hoja("hoja_3_1");

		$root->agregar($nodo_1);
		$root->agregar($hoja_2);
		$root->agregar($nodo_3);

		$nodo_3->agregar($hoja_3_1);

		$nodo_1->agregar($hoja_1_2);
		$nodo_1->agregar($nodo_1_1);
		

		$nodo_1_1->agregar($nodo_1_1_1);
		$nodo_1_1->agregar($hoja_1_1_2);

		// getInformacion imprime los grados de los nodos y las hojas
		// en el orden que se agregaron a su predecesor.
		$root->getInformacion(1);
	}
}

abstract class Arbol {
	protected $nombre;

	function Arbol(string $nombre_){
		$this->nombre = $nombre_;
	}

	abstract function agregar(Arbol $elemento);
	abstract function borrar(Arbol $elemento);
	// Este método recibe el grado del nodo al que está referenciando. 
	// root podría ser getInformacion(1) mientras que un nodo de  
	// grado 3 sería getInformacion(3)
	abstract function getInformacion(int $elemento); 
}

class Nodo extends Arbol {
	private $hijos = array();

	function Nodo(string $nombre_){
		parent::Arbol($nombre_);
	}

	function __construct(){
		parent::__construct(get_class($this->nombre));
	}

	function agregar(Arbol $hijo){
		array_push($this->hijos, $hijo);  
	}

	function borrar(Arbol $nombre){
	    if(($clave = array_search($nombre, $this->hijos, TRUE)) !== FALSE) {
	        unset($this->hijos[$clave]);
	    }
	}

	function getInformacion(int $profundidad){
		echo $this->nombre." nivel: ".$profundidad."\n";
		for ($i = 0; $i < sizeof($this->hijos); $i++){
			$this->hijos[$i]->getInformacion($profundidad + 1);
		}
	}
 }

class Hoja extends Arbol {

	function Hoja(string $nombre_){
		parent::Arbol($nombre_);
	}

	function agregar(Arbol $elemento){
		echo "No se pueden agregar elementos a una hoja";
	}

	function borrar(Arbol $elemento){
		echo "No se pueden borrar elementos en una hoja";
	}

	function getInformacion(int $profundidad){
		echo "-".$this->nombre."\n";
	}
}

new Cliente()

// [R] = root 
// [*] = nodo
// [!] = hoja
// 
// 
//				----------------[R]---------------- 
// 				|				 |				  |	
// 		   ----[*]----			[!]				 [*]
// 		   |		 |							  |
//		--[*]--		[!]							 [!]
//		|	  |
//	   [*]   [!]
//

?>