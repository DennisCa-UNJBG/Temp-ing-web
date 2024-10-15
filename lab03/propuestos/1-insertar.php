<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar con POST</title>
</head>

<body>
    <?php
    echo "Procesando... <br/>";

    include '../2-conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $edad = $_POST["edad"];

        if (!empty($nombre) && !empty($edad) && !empty($email)) {
            $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$email', $edad)";
            if ($conn->query($sql) === TRUE) {
                echo "Nuevo registro creado exitosamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            // Cerrar la conexión
            $conn->close();
        } else {
            echo "Por favor, completa todos los campos";
        }
    }
    ?>
</body>

</html>