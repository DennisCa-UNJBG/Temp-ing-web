<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function calcular_area_circulo($radio) {
            return 3.1416 * $radio * $radio;
        }

        echo "El área de un círculo de 5 es " . calcular_area_circulo(5);
    ?>
</body>
</html>