<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexión con PDO</title>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practica_php";

    try {
        // Crear conexión PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Configurar el modo de error PDO para que lance excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexión exitosa <br/>";

        foreach($conn->query('SELECT * from usuarios') as $fila) {
            print_r($fila);
            echo "<br/>";
        }
        $conn = null;
    } catch (PDOException $e) {
        echo "Conexión fallida: " . $e->getMessage();
    }
    ?>
</body>

</html>