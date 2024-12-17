<?php

interface PersonajeVideoGame {
    public function descripcion();
}

class Guerrero implements PersonajeVideoGame {
    public function descripcion() {
        return "Guerrero básico.";
    }
}

class DecoradorPersonaje implements PersonajeVideoGame {
    protected $personaje;

    public function __construct(PersonajeVideoGame $personaje) {
        $this->personaje = $personaje;
    }

    public function descripcion() {
        return $this->personaje->descripcion();
    }
}

class Espada extends DecoradorPersonaje {
    public function descripcion() {
        return parent::descripcion() . " Equipado con Espada.";
    }
}

class Armadura extends DecoradorPersonaje {
    public function descripcion() {
        return parent::descripcion() . " Equipado con Armadura.";
    }
}

$guerrero = new Guerrero();
$guerreroConEspada = new Espada($guerrero);
$guerreroConEspadaYArmadura = new Armadura($guerreroConEspada);

echo $guerreroConEspadaYArmadura->descripcion();
?>
