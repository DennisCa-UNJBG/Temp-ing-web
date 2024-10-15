<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 01</title>
</head>

<body>
    <?php
    $numero = -3;

    if ($numero > 0) {
        echo "El número es positivo";
    } elseif ($numero < 0) {
        echo "El número es negativo";
    } else {
        echo "El número es cero";
    }
    ?>
</body>

</html>