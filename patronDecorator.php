<?php

// El patrón Decorator responde a la necesidad de añadir transparente y dinámicamente 
// funcionalidad a un Objeto. Se usa cuando hay una necesidad de extender la funcionalidad 
// de una clase, pero no hay razones para extenderlo a través de la herencia o existe la 
// necesidad de extender dinámicamente la funcionalidad de un objeto y quizás quitar 
// la funcionalidad extendida.
// El decorador redirige las solicitudes al componente asociado. 
// Al utilizar este patrón, se pueden añadir y eliminar responsabilidades en tiempo de ejecución.


interface iCafe {
	function getCostoBase();
}

class Cafe implements iCafe {
	protected $costoBase_ = 0;

	function getCostoBase(){
		return $this->costoBase_;
	}
}

class CafeNegro extends Cafe {
	function __construct(){
		$this->costoBase_ = 5;
	}
}

abstract class DecoratorCafe implements iCafe {
	protected $cafe_;

	function __construct(iCafe $cafe){
		$this->cafe_ = $cafe;
	}
}

class ConCrema extends DecoratorCafe {
	function getCostoBase(){
		return 1.5 + $this->cafe_->getCostoBase();
	}
}

class ConLeche extends DecoratorCafe {
	function getCostoBase(){
		return 4 + $this->cafe_->getCostoBase();
	}
}

class ConChocolate extends DecoratorCafe {
	function getCostoBase(){
		return 5 + $this->cafe_->getCostoBase();
	}
}

$cafeConLeche = new ConLeche(new Cafe());
$cafeNegroConChocolate = new ConChocolate(new CafeNegro());
$cafeCompleto = new ConChocolate(new ConLeche(new ConCrema(new CafeNegro())));

echo 'El precio del cafe con leche es: $' . $cafeConLeche->getCostoBase() . "\n" ;
echo 'El precio del cafe negro con chocolate es: $' . $cafeNegroConChocolate->getCostoBase() . "\n" ;
echo 'El precio del cafe completo es: $' . $cafeCompleto->getCostoBase() . "\n" ;

?>