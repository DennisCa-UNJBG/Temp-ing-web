<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $op = isset($_POST["op"]) ? $_POST["op"] : 0;

        switch ($op) {
            case 1:
                echo '
                    <form action="2-insertar.php" method="post" >
                        Nombre: <input type="text" name="nombre"> <br />
                        Correo: <input type="email" name="email"> <br />
                        Edad: <input type="number" name="edad"> <br />
                        <input type="submit" value="Enviar"> <br />
                    </form>
                ';
                break;
            case 2:
                echo '
                    <form action="2-actualizar.php" method="post" >
                        ID: <input type="number" name="id"> <br />
                        Correo: <input type="email" name="email"> <br />
                        <input type="submit" value="Enviar"> <br />
                    </form>
                ';
                break;
            case 3:
                echo '
                    <form action="2-eliminar.php" method="post" >
                        ID: <input type="number" name="id"> <br />
                        <input type="submit" value="Enviar"> <br />
                    </form>
                ';
                break;
        }
    }
    ?>
    <a href="./2-elegir"><input type="submit" value="Regresar"></a>
</body>

</html>