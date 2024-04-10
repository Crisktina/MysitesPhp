<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// Sumatorio de un array 
// - Cargaremos 10 valores mediante un formulario
// - Se guardaran en un array
// - Tendremos que devolver el sumatorio Y el valor máximo y mínimo.
// - Si teníamos una función previa que hacia esto deberemos utilizarla

if (isset($_POST["calcular"]) && isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["num3"]) && isset($_POST["num4"]) && isset($_POST["num5"]) && isset($_POST["num6"]) && isset($_POST["num7"]) && isset($_POST["num8"]) && isset($_POST["num9"]) && isset($_POST["num10"])) {

    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $num3 = $_POST["num3"];
    $num4 = $_POST["num4"];
    $num5 = $_POST["num5"];
    $num6 = $_POST["num6"];
    $num7 = $_POST["num7"];
    $num8 = $_POST["num8"];
    $num9 = $_POST["num9"];
    $num10 = $_POST["num10"];

   $suma = array($num1, $num2, $num3, $num4, $num5, $num6, $num7, $num8, $num8, $num10);
   //print_r($suma);

   $res = array_sum($suma);
   //print_r($res);

   $resMax = max($suma);
   //print_r($resMax);

   $resMin = min($suma);
   print_r($resMin);
}

?>


<form method="post">
    <p>Introduce un numero en cada campo:</p>
    <input type="number" name="num1" value="<?= $num1 ?>"> <br>
    <input type="number" name="num2" value="<?= $num2 ?>"> <br>
    <input type="number" name="num3" value="<?= $num3 ?>"> <br>
    <input type="number" name="num4" value="<?= $num4 ?>"> <br>
    <input type="number" name="num5" value="<?= $num5 ?>"> <br>
    <input type="number" name="num6" value="<?= $num6 ?>"> <br>
    <input type="number" name="num7" value="<?= $num7 ?>"> <br>
    <input type="number" name="num8" value="<?= $num8 ?>"> <br>
    <input type="number" name="num9" value="<?= $num9 ?>"> <br>
    <input type="number" name="num10" value="<?= $num10 ?>"> <br>  <br>
    <input type="submit" value="Calcular" name="calcular">
    <p><?php echo "La suma de los numeros es $res, el valor máximo es $resMax y el mínimo es $resMin " ?></p>
</form>

</body>
</html>