<?php
interface SalidaStrategy {
    public function mostrar($mensaje);
}

class SalidaConsola implements SalidaStrategy {
    public function mostrar($mensaje) {
        echo "Consola: " . $mensaje . PHP_EOL;
    }
}

class SalidaJSON implements SalidaStrategy {
    public function mostrar($mensaje) {
        echo json_encode(["mensaje" => $mensaje]) . PHP_EOL;
    }
}

class SalidaTXT implements SalidaStrategy {
    public function mostrar($mensaje) {;
        echo $mensaje . " Mensaje guardado en salida.txt" . PHP_EOL;
    }
}

class Mensaje {
    private $strategy;

    public function __construct(SalidaStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function mostrar($mensaje) {
        $this->strategy->mostrar($mensaje);
    }
}

$mensaje = "Buenas a quien califica esto, que tengas un buen dia.";

$contexto = new Mensaje(new SalidaConsola());
$contexto->mostrar($mensaje);

echo "<br/>";

$contexto = new Mensaje(new SalidaJSON());
$contexto->mostrar($mensaje);

echo "<br/>";


$contexto = new Mensaje(new SalidaTXT());
$contexto->mostrar($mensaje);
?>
