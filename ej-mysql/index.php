<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Principal</title>
</head>
<?php 
//Si el usuario no esta registrado volver a login


include_once "conexion.php";
//consulta de datos
$consulta = "SELECT * FROM paises";
$result = $conexion -> query($consulta);
//print_r($result);

$arr = [];
// Array asociativo
while ($fila = $result -> fetch_array(MYSQLI_ASSOC)) {
  $arr[]=$fila;
}
//print_r( $arr);

include_once "cerrarConexion.php";
?>
<body>
<h2>Datos</h2>
<table>
  <tr>
    <th>Código postal</th>
    <th>Ciudad</th>
  </tr>
  <?php foreach ($arr as $key => $value) {
    echo "<tr><td>".$value['codigo']."</td><td>".$value['pais']."</td></tr>";
}?>
</table>
</body>
</html>