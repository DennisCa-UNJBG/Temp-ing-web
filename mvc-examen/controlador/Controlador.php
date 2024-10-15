<?php
require_once '../modelo/Modelo.php';
class Controlador {
    private $modelo;
    public function __construct() {
        $this->modelo = new Modelo();
    }
    public function insertarProducto($nombre, $precio) {
        $this->modelo->insertar($nombre, $precio);
    }
    public function mostrarProductos() {
        return $this->modelo->mostrar();
    }
    public function eliminarProducto($id) {
        $this->modelo->eliminar($id);
    }
    public function actualizarProducto($id, $nombre, $precio) {
        $this->modelo->actualizar($id, $nombre, $precio);
    }
}
?>
