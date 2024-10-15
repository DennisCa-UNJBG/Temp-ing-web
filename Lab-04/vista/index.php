<?php require 'layout/header.php'; ?>

<a href="index.php?accion=nuevo">Nuevo Producto</a>

<!-- Formulario de búsqueda -->
<form method="GET" action="">
    <input type="text" name="busqueda" placeholder="Buscar producto..." value="<?php echo isset($_GET['busqueda']) ? htmlspecialchars($_GET['busqueda'], ENT_QUOTES, 'UTF-8') : ''; ?>">
    <button type="submit">Buscar</button>
</form>

<button type="submit"><a href="index.php?accion=reporte">Imprimir Reporte de Productos</a></button>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($productos as $producto): ?>
    <tr>
        <td><?php echo htmlspecialchars($producto['id'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars($producto['nombre'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars(number_format($producto['precio'], 2), ENT_QUOTES, 'UTF-8'); ?></td>
        <td><img src="<?php
            $imagen = base64_encode($producto['imagen']);
            $imagen = 'data:image/jpeg;base64,' .$imagen;
            echo $imagen;
            ?>" alt="Imagen" width="150"></td>
        <td>
            <a href="index.php?accion=editar&id=<?php echo htmlspecialchars($producto['id'], ENT_QUOTES, 'UTF-8'); ?>">Editar</a>
            <a href="index.php?accion=eliminar&id=<?php echo htmlspecialchars($producto['id'], ENT_QUOTES, 'UTF-8'); ?>">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php require 'layout/footer.php'; ?>
