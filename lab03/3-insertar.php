<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar db</title>
</head>

<body>
    <?php
    include '2-conexion.php'; // Incluir el archivo de conexión
    // Definir los datos a insertar
    $nombre = "Juan Perez";
    $email = "juan@example.com";
    $edad = 28;
    // SQL para insertar un nuevo registro
    $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$email', $edad)";
    // Ejecutar la consulta e imprimir el resultado
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Cerrar la conexión
    $conn->close();
    ?>
</body>

</html>