<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 01</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $chk[1] = isset($_POST["1"]) ? $_POST["1"] : 0;
        $chk[2] = isset($_POST["2"]) ? $_POST["2"] : 0;
        $chk[3] = isset($_POST["3"]) ? $_POST["3"] : 0;

        foreach($chk as $op){
            if(!empty($op)) {
                echo "Elegiste la opción $op <br> ";
            }
        }

        if ($chk[1] == 0 && $chk[2] == 0 && $chk[3] == 0) {
            echo "No elegiste ninguna opción  <br> ";
        }
    }
    ?>
</body>
</html>