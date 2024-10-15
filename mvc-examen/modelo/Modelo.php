<?php
class Modelo {
    private $conexion;
    public function __construct() {
        $this->conexion = new mysqli('localhost', 'root', '', 'examen_mvc');
        if ($this->conexion->connect_error) {
            die('Error en la conexión: ' . $this->conexion->connect_error);
        }
    }
    public function insertar($nombre, $precio) {
        $stmt = $this->conexion->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
        $stmt->bind_param("sd", $nombre, $precio);
        $stmt->execute();
        $stmt->close();
    }
    public function mostrar() {
        $result = $this->conexion->query("SELECT * FROM productos");
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function eliminar($id) {
        $stmt = $this->conexion->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    public function actualizar($id, $nombre, $precio) {
        $stmt = $this->conexion->prepare("UPDATE productos SET nombre = ?, precio = ? WHERE id = ?");
        $stmt->bind_param("sdi", $nombre, $precio, $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
