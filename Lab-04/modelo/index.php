<?php
class Modelo {
private $db;
private $productos;
public function __construct() {
$this->db = new PDO('mysql:host=localhost;dbname=mvc', 'root', '');
$this->productos = [];
}
public function insertar($nombre, $precio, $imagenBinaria) {
    // Validar los datos antes de proceder
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($nombre && $precio && $precio >= 0) { // Validación adicional para evitar valores negativos
        $sql = "INSERT INTO productos (nombre, precio, imagen) VALUES (:nombre, :precio, :imagenBinaria)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
        $stmt->bindParam(':imagenBinaria', $imagenBinaria, PDO::PARAM_LOB);
        return $stmt->execute();
    } else {
        // Retornar falso si la validación falla
        return false;
    }
}

public function mostrar($id = null) {
    if ($id) {
        $consulta = $this->db->prepare("SELECT * FROM productos WHERE id = :id");
        $consulta->bindParam(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC);
    } else {
        $consulta = $this->db->query("SELECT * FROM productos");
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}

public function actualizar($id, $nombre, $precio) {
    // Validar los datos antes de proceder
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
    $precio = filter_var($precio, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    if ($id && $nombre && $precio && $precio >= 0) {
        $sql = "UPDATE productos SET nombre = :nombre, precio = :precio WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } else {
        // Retornar falso si la validación falla
        return false;
    }
}

public function eliminar($id) {
    if ($id) { // Validar ID antes de proceder
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    } else {
        return false;
    }
}

//Formulario de búsqueda
public function buscarnombre($nombre) {
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING); // Sanitizar el nombre
    $consulta = $this->db->prepare("SELECT * FROM productos WHERE nombre LIKE :nombre");
    $consulta->execute([':nombre' => '%' . $nombre . '%']);
    return $consulta->fetchAll(PDO::FETCH_ASSOC);
}

}
?>