<?php
// Una clase abstracta que es común a varios juegos en los que los jugadores 
// juegan contra los demás, pero solo uno está jugando en un momento dado(turno).
abstract class Juego {
    // Métodos de gancho. La implementación concreta puede diferir en cada subclase
    protected $contadorJugadores;
    abstract function inicializarJuego();
    abstract function hacerJugada(int $jugador);
    abstract function finDelJuego();
    abstract function imprimirGanador();

    // Un método template el cual funcionará como scheduler en el transcurso
    // de algun juego concreto, se declara como final para que no pueda ser sobreescrito.
    final public function jugarUnJuego(int $contadorJ){
        $this->contadorJugadores = $contadorJ;
        $this->inicializarJuego();
        $j = 0;
        while(!$this->finDelJuego()){
            $this->hacerJugada($j);
            $j++;
        }
    $this->imprimirGanador();
    }
}

// Estamos listos para heredar la clase Juego y implementarla en juegos concretos

class Monopoly extends Juego {
    // Implementación de métodos concretos necesarios
    function inicializarJuego(){
        // Inicializar jugadores
        // Inicializar dinero
    }

    function hacerJugada(int $jugador){
        // Procesar el turno del jugador
    }

    function finDelJuego(){
        // Devuelve true si el juego se acabo
        // dependiendo de las reglas del Monopoly
    }

    function imprimirGanador(){
        // Imprime que jugador ganó
    }

    // Declaraciones específicas del Monopoly
    // ...
}

class Ajedrez extends Juego {
   // Implementación de métodos concretos necesarios
    function inicializarJuego(){
        // Inicializar jugadores
        // Colocar piezas en el tablero
    }

    function hacerJugada(int $jugador){
        // Procesar el turno del jugador
    }

    function finDelJuego(){
        // Devuelve true si el juego está en JaqueMate
        // o llegaron al punto de quiebre.
    }

    function imprimirGanador(){
        // Imprime que jugador ganó
    }

    // Declaraciones específicas del ajedrez
    // ...
}


// El patron Template define el esqueleto de una clase y el algoritmo para proceder
// en tiempo de ejecución en un método. Permite que las clases herederas tengan
// comportamiento propio y evita la duplicación del código de procedimiento.
?>