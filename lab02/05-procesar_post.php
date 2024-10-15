<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

            if (!empty($nombre) && !empty($edad)) {
                echo "Hola $nombre, tienes $edad años.";
            } else {
                echo "Por favor, completa todos los campos";
            }
        }
    ?>
</body>
</html>