<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
    <?php
    require "Coche.php";
    $coche1 = new Coche("5645HVZ","Peugeot", "verde", 4);
    var_dump($coche1);
    echo "<br>";
    $coche1->arrancarCoche();
    ?>
</body>
</html>