<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Get</title>
</head>
<body>
    <?php
        echo "Nombre: " . htmlspecialchars($_GET['nombre']) . "<br>";
        echo "Correo electrónico: " . htmlspecialchars($_GET['correo']) . "<br>";
        echo "Edad: " . htmlspecialchars($_GET['edad']) . "<br>";
    ?>
</body>
</html>