<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer de DB</title>
</head>

<body>
    <?php
    include '2-conexion.php'; // Incluir el archivo de conexión
    // SQL para seleccionar registros
    $sql = "SELECT id, nombre, email, edad FROM usuarios";
    $result = $conn->query($sql);
    // Verificar si hay resultados y mostrarlos
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"] . " - Nombre: " . $row["nombre"] . " - Email: " .
                $row["email"] . " - Edad: " . $row["edad"] . "<br>";
        }
    } else {
        echo "0 resultados";
    }
    // Cerrar la conexión
    $conn->close();
    ?>
    <input type="submit">
    <a href="1.html"><input type="submit" class="button_active" value="1"></a>
</body>

</html>