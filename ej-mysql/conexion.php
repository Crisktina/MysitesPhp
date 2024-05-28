<?php 
$conexion = mysqli_connect ("localhost", "root", "","web");

if ($conexion -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }

if($conexion){
echo "Conexión exitosa.<br>";
}


?>