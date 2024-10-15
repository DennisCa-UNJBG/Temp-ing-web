<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 05</title>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST["data"];
        $array = array_values(array_filter(explode(PHP_EOL, $data)));
        echo $data ."<br>";
        foreach($array as $key => $option) {
            echo $key . "=" . $option . "<br>";
        }
    }
    ?>
</body>
</html>