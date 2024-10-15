<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 06</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $num[1] = isset($_POST["num01"]) ? $_POST["num01"] : 0;
        $num[2] = isset($_POST["num02"]) ? $_POST["num02"] : 0;
        $num[3] = isset($_POST["num03"]) ? $_POST["num03"] : 0;

        foreach($chk as $op){
            if(!empty($op)) {
                echo "Elegiste la opción $op <br> ";
            }
        }
    }
    ?>
</body>
</html>