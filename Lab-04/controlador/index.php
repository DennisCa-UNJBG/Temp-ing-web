<?php
require_once("./modelo/index.php");

class Controlador {
    private $model;

    public function __construct() {
        $this->model = new Modelo();
    }

    public function index() {
        // Obtener y sanitizar el parámetro de búsqueda
        $busqueda = filter_input(INPUT_GET, 'busqueda', FILTER_SANITIZE_STRING);
        if ($busqueda) {
            $productos = $this->model->buscarnombre($busqueda);
        } else {
            $productos = $this->model->mostrar();
        }
        require_once("./vista/index.php");
    }

    public function nuevo() {
        require_once("./vista/nuevo.php");
    }
    public function reporte() {
        $productos = $this->model->mostrar();
        require_once("./vista/reporteProductos.php");
    }

    public function guardar() {
        // Sanitizar entradas de formularios
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $precio = filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $imagen = $_FILES['imagen'];
        $imagenBinaria = file_get_contents($imagen['tmp_name']);

        // Validar datos
        if ($nombre && $precio !== false && $precio >= 0) {
            $this->model->insertar($nombre, $precio, $imagenBinaria);
            header("Location: ./index.php");
        } else {
            echo "Error: Datos inválidos.";
        }
    }

    public function editar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id && $id > 0) {
            $producto = $this->model->mostrar($id);
            if ($producto) {
                require_once("./vista/editar.php");
            } else {
                echo "Producto no encontrado.";
            }
        } else {
            echo "ID inválido.";
        }
    }

    public function actualizar() {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $precio = filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

        // Validar datos
        if ($id && $nombre && $precio !== false && $precio >= 0) {
            $this->model->actualizar($id, $nombre, $precio);
            header("Location: ./index.php");
        } else {
            echo "Error: Datos inválidos.";
        }
    }

    public function eliminar() {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id && $id > 0) {
            $this->model->eliminar($id);
            header("Location: ./index.php");
        } else {
            echo "ID inválido.";
        }
    }
}
?>
