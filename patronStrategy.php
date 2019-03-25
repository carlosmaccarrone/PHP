<?php
// El patron Strategy determina cómo se realiza el intercambio 
// de mensajes entre diferentes objetos para resolver una tarea,
// a modo de reutilizar el código, que el cliente no almacene
// algoritmos que no usará y mantenga una cohesión en el código.

// Permite que el objeto cliente pueda elegir un algoritmo
// que le convenga e intercambiarlo por otros dinámicamente.

class Strategy {
    public function __construct() {
        $contexto1 = new Boton(new Suma());
        $contexto1->correr();

        $contexto2 = new Boton(new Producto());
        $contexto2->correr();

        $contexto3 = new Boton(new Resta());
        $contexto3->correr();
    }
}

// Las interfaces de objeto especifican que métodos deben ser implementados por
// una clase, éstos deben ser publicos y no deben tener un contenido definido
interface InterfazAritmetica {
    public function ejecutar();
}

class Suma implements InterfazAritmetica {
    public function ejecutar() {
        echo "Método de ejecución Strategy A - Suma 6 + 4 = ";
        echo 6+4 ."\n";
    }
}

class Producto implements InterfazAritmetica {
    public function ejecutar() {
        echo "Método de ejecución Strategy B - Producto 6 * 4 = ";
        echo 6*4 ."\n";
    }
}

class Resta implements InterfazAritmetica {
    public function ejecutar() {
        echo "Método de ejecución Strategy C - Resta 6 - 4 = ";
        echo 6-4 ."\n";
    }
}

class Boton {
    var $objeto;

    // Recibo una instancia de tipo InterfazAritmetica
    public function __construct(InterfazAritmetica $objeto_) {
        $this->objeto = $objeto_;
    }

    public function correr() {
        $this->objeto->ejecutar();
    }
}

// La clase Strategy(cliente) instancia botones de la clase Boton
// con la InterfazAritmetica y cada botón realiza una operación diferente.
new Strategy;
?>
