<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar DB</title>
</head>

<body>
    <?php
    include '2-conexion.php'; // Incluir el archivo de conexión
    // Datos a actualizar
    $nuevo_email = "juan.perez@example.com";
    $id = 1;
    // SQL para actualizar un registro
    $sql = "UPDATE usuarios SET email='$nuevo_email' WHERE id=$id";
    // Ejecutar la consulta e imprimir el resultado
    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente";
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
    // Cerrar la conexión
    $conn->close();
    ?>

</body>

</html>