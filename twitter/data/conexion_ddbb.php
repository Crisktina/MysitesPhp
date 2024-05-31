<?php 
$conexion = mysqli_connect ("localhost", "root", "","twitter");

if ($conexion -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }


?>