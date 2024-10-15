<?php
require_once '../controlador/Controlador.php';
$controlador = new Controlador();
if (isset($_POST['agregar'])) {
    $controlador->insertarProducto($_POST['nombre'], $_POST['precio']);
    header("Location: index.php");
    exit();
}
if (isset($_GET['eliminar'])) {
    $controlador->eliminarProducto($_GET['eliminar']);
    header("Location: index.php");
    exit();
}
$productos = $controlador->mostrarProductos();
$productoEditar = isset($_GET['editar']) ? $productos[array_search($_GET['editar'], array_column($productos, 'id'))] : null;
if (isset($_POST['actualizar'])) {
    $controlador->actualizarProducto($_POST['id'], $_POST['nombre'], $_POST['precio']);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
</head>
<body>
    
    <h1>Agregar Producto</h2>
    <form method="post">
        <label>Nombre: </label>
        <input type="text" name="nombre" required><br>
        <label>Precio: </label>
        <input type="number" name="precio" step="0.01" required><br>
        <button type="submit" name="agregar">Agregar</button>
    </form>
    <h2>Productos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td>
                    <a href="?editar=<?php echo $producto['id']; ?>">Editar</a>
                    <a href="?eliminar=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <?php if ($productoEditar): ?>
        <h2>Editar Producto</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $productoEditar['id']; ?>">
            <label>Nombre: </label>
            <input type="text" name="nombre" value="<?php echo $productoEditar['nombre']; ?>" required><br>
            <label>Precio: </label>
            <input type="number" name="precio" value="<?php echo $productoEditar['precio']; ?>" step="0.01" required><br>
            <button type="submit" name="actualizar">Actualizar</button>
        </form>
    <?php endif; ?>
</body>
</html>
