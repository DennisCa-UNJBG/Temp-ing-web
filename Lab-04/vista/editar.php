<?php require 'layout/header.php'; ?>
<h2>Editar Producto</h2>
<form action="index.php?accion=actualizar" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['id'], ENT_QUOTES, 'UTF-8'); ?>">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
    <label>Precio:</label><br>
    <input type="number" name="precio" value="<?php echo htmlspecialchars($producto['precio'], ENT_QUOTES, 'UTF-8'); ?>" step="0.01" min="0" required><br>
    <label>Imagen:</label><br>
    <img src="<?php
            $imagen = base64_encode($producto['imagen']);
            $imagen = 'data:image/jpeg;base64,' .$imagen;
            echo $imagen;
            ?>" alt="Imagen" width="600"><br>
    <input type="submit" value="Actualizar">
</form>

<?php
//Validacion de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = trim($_POST["nombre"]);
    $precio = trim($_POST["precio"]);

    $errores = [];
    if (empty($nombre)) {
        $errores[] = "El nombre del producto es obligatorio.";
    }
    if (empty($precio) || !is_numeric($precio) || $precio < 0) {
        $errores[] = "El precio debe ser un valor numérico positivo.";
    }

    if (empty($errores)) {
        echo "<div class='success'>Producto actualizado exitosamente.</div>";
    } else {
        foreach ($errores as $error) {
            echo "<div class='error'>$error</div>";
        }
    }
}
?>
<?php require 'layout/footer.php'; ?>
