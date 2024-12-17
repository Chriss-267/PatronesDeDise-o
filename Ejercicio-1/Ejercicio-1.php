<?php

interface Personaje {
    public function atacar();
    public function velocidad();
}

class Esqueleto implements Personaje {
    public function atacar() {
        return "El Esqueleto ataca con un arco.";
    }

    public function velocidad() {
        return "Velocidad: media.";
    }
}


class Zombi implements Personaje {
    public function atacar() {
        return "El Zombi ataca mordiendote.";
    }

    public function velocidad() {
        return "Velocidad: alta.";
    }
}


class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        switch ($nivel) {
            case 'facil':
                return new Esqueleto();
            case 'dificil':
                return new Zombi();
            default:
                throw new Exception("Nivel no reconocido.");
        }
    }
}

try {
    $nivel = 'facil'; 
    $personaje = PersonajeFactory::crearPersonaje($nivel);

    echo $personaje->atacar() . PHP_EOL;
    echo $personaje->velocidad() . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
