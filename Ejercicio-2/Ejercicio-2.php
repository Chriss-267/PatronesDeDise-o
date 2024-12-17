<?php
class Windows7File {
    public function abrirArchivo() {
        return "Archivo abierto en Windows 7.";
    }
}

interface Windows10FileInterface {
    public function abrirArchivoWindows10();
}


class Windows10Adapter implements Windows10FileInterface {
    private $windows7File;

    public function __construct(Windows7File $file) {
        $this->windows7File = $file;
    }

    public function abrirArchivoWindows10() {
        return $this->windows7File->abrirArchivo() . " Adaptado para Windows 10.";
    }
}

$archivo = new Windows7File();
$adapter = new Windows10Adapter($archivo);
echo $adapter->abrirArchivoWindows10();
?>
