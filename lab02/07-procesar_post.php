<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php
        $nombre = $_POST['nombre'];
        $edad = $_POST['correo'];

        if (empty($nombre) || empty($correo)) {
            echo "Error: El nombre y el correo son obligatorios.";
        } else {
            echo "Nombre: $nombre <br>";
            echo "Correo electrónico: $email <br>";
        }
    ?>
</body>
</html>