<?php

interface Animal {
    function hacerRuido();
}

class Perro implements Animal {
    function hacerRuido(){
        echo "Woof..\n";
    }
}

class Gato implements Animal {
    function hacerRuido(){
        echo "Meowww..\n";
    }
}

class NullAnimal implements Animal {
    function hacerRuido(){
        // silencio...
    }
}

$tipoDeAnimal = "elefante";
switch($tipoDeAnimal){
    case "perro":
        $animal = new Perro();
        break;
    case "gato":
        $animal = new Gato();
        break;
    default:
        $animal = new NullAnimal();
        break;
}
$animal->hacerRuido(); // el animal que cae por defecto en Nulo no hace ruido

// Un objeto nulo es un objeto sin valor referenciado o con un comportamiento 
// neutral ("nulo") definido. El patrón de diseño de objeto nulo describe los 
// usos de dichos objetos y su comportamiento (o falta de ellos). 

// Puede considerarse como un caso especial del patrón State y del patrón de la Strategy.

// Este patrón se debe usar con cuidado ya que puede hacer que los errores aparezcan como 
// una ejecución normal del programa
?>