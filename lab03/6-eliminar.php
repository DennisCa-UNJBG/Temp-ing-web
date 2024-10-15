<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elminar de DB</title>
</head>

<body>
    <?php
    include '2-conexion.php'; // Incluir el archivo de conexión
    // ID del registro a eliminar
    $id = 1;
    // SQL para eliminar un registro
    $sql = "DELETE FROM usuarios WHERE id=$id";
    // Ejecutar la consulta e imprimir el resultado
    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error eliminando el registro: " . $conn->error;
    }
    // Cerrar la conexión
    $conn->close();
    ?>
</body>

</html>