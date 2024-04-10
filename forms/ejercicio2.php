<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php


$num1 = $num2= $res= "";

//mostrar $res en el imput:

switch (isset($_POST["sumar"]) || isset($_POST["restar"]) || isset($_POST["multiplicar"]) || isset($_POST["dividir"])) {
    case 'sumar':
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $res=suma($num1,$num2);
        break;

    case 'restar':
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $res=resta($num1,$num2);
        break;
    case 'multiplicar':
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $res=multiplica($num1,$num2);
        break;
    case 'dividir':
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $res=divide($num1,$num2);
        break;
    
    default:
        echo "no se puede procesar";
        break;
}


function suma($num1, $num2) {
    if (is_numeric($num1) && is_numeric($num2)) {
        return $num1 + $num2;
    } else return "No se puede"; 
}
function resta($num1, $num2) {
    if (is_numeric($num1) && is_numeric($num2)) {
        return $num1 - $num2;
    } else return "No se puede"; 
}

function multiplica($num1, $num2) {
    if (is_numeric($num1) && is_numeric($num2)) {
        return $num1 * $num2;
    } else return "No se puede"; 
}

function divide($num1, $num2) {
    if (is_numeric($num1) && is_numeric($num2)) {
        return $num1 / $num2;
    } else return "No se puede"; 
}

?>

<input type="text" name="cadena" value="Valor por defecto" size="20">
<input type="submit" name="enviar" value="Enviar">

<form method="post">
<br><br><br>
<label>Número 1:</label>
<input type="number" name="num1" value="<?php echo $num1;?>">
<br>
<label>Número 2:</label>
<input type="number" name="num2" value="<?= $num2;?>">
<br>
<p><?php if (isset($_POST["sumar"])) 
    echo "La suma de $num1 y $num2 es= ".suma($num1,$num2) ?></p>
<input type="submit" name="sumar" value="Sumar">

<p><?php if (isset($_POST["restar"])) 
    echo "La resta de $num1 y $num2 es= ".resta($num1,$num2) ?></p>
<input type="submit" name="restar" value="Restar">

<p><?php if (isset($_POST["multiplicar"])) 
    echo "La multiplicación de $num1 y $num2 es= ".multiplica($num1,$num2) ?></p>
<input type="submit" name="multiplicar" value="Mulitplicar">

<p><?php if (isset($_POST["dividir"])) 
    echo "La división de $num1 y $num2 es= ".divide($num1,$num2) ?></p>
<input type="submit" name="dividir" value="Dividir">
<br>
<br>
<label>Resultado:</label>
<input type="number" value="<?= $res;?>" readonly>


</form>

</body>
</html>