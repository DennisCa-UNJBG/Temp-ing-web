<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 03</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $edad = isset($_POST["edad"]) ? $_POST["edad"] : null;

        if($edad == null) {
            echo "No envio ninguna edad para evaluar";
        } elseif($edad < 18){
            echo "Debe enviar una edad mayor a 18";
        } else {
            echo "Su edad es $edad";
        }
    }
    ?>
</body>
</html>