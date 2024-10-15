<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elminar de DB</title>
</head>

<body>
    <?php
    echo "Procesando... <br/>";

    include '../2-conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];

        if (!empty($id)) {
            $sql = "DELETE FROM usuarios WHERE id=$id";
            // Ejecutar la consulta e imprimir el resultado
            if ($conn->query($sql) === TRUE) {
                echo "Registro eliminado exitosamente";
            } else {
                echo "Error eliminando el registro: " . $conn->error;
            }
            // Cerrar la conexión
            $conn->close();
        } else {
            echo "Por favor, completa todos los campos";
        }
    }
    ?>
    <br>
    <a href="./2-elegir.php"><input type="submit" value="Regresar"></a>
</body>

</html>