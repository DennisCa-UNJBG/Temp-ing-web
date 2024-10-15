<?php require 'layout/header.php'; ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Imagen</th>
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
    </tr>
    <?php endforeach; ?>
</table>

<!-- ejecución automática de la impresión al cargar la página -->
<script type="text/javascript">
    window.onload = function() {
        window.print();
    };
    // Redirigir después de imprimir o cancelar
    window.onafterprint = function() {
            window.location.href = 'index.php'; // Cambia esta ruta por la que desees
        };
</script>

<?php require 'layout/footer.php'; ?>


