<?php 
$conexion = mysqli_connect ("localhost", "root", "", "maps");

if ($conexion -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
session_start();

?>