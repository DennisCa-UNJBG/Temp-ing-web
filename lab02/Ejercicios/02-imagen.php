<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 02</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        if (isset($_FILES['imagen1']['name']) && $_FILES['imagen1']['name'] !="") {
            
            echo "Nombre de la imagen: " . $_FILES['imagen1']['name'];
            echo "<br> Fichera de la imagen: " . $_FILES['imagen1']['tmp_name'];
            echo "<br> Tipo de imagen: " . $_FILES['imagen1']['type'];
            echo "<br> Tamaño de la imagen: " . $_FILES['imagen1']['size'];
    
        } else {
            echo "No selecciono ninguna foto...";
        }
    }
    ?>
</body>
</html>