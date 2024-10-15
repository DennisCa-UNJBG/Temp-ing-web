<?php require 'layout/header.php'; ?>
<h2>Nuevo Producto</h2>
<form action="index.php?accion=guardar" method="POST" enctype="multipart/form-data">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br>
    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" min="0" required><br>
    <label>Imagen:</label><br>
    <input type="file" name="imagen" accept="image/png, image/jpeg"required><br><br>
    <input type="submit" value="Guardar">
</form>

<?php
//Validacion de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $precio = trim($_POST["precio"]);
    $imagen = trim($_POST["imagen"]);

    $errores = [];
    if (empty($nombre)) {
        $errores[] = "El nombre del producto es obligatorio.";
    }
    if (empty($precio) || !is_numeric($precio) || $precio < 0) {
        $errores[] = "El precio debe ser un valor numérico positivo.";
    }
    if (empty($imagen)) {
        $errores[] = "La imagen es obligatoria.";
    }
    // Limitar el tamaño de la imagen a 5MB
    if ($imagen['size'] <= 5 * 1024 * 1024) {
        $errores[] = "El tamaño de la imagen no puede ser superior a 5MB";
    }

    if (empty($errores)) {
        echo "<div class='success'>Producto guardado exitosamente.</div>";
    } else {
        foreach ($errores as $error) {
            echo "<div class='error'>$error</div>";
        }
    }
}
?>
<?php require 'layout/footer.php'; ?>
