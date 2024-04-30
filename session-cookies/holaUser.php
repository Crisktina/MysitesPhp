<?php 
session_start();

if ($_SESSION['user_id']) {
  //  header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola <?=$_SESSION['username']?>!</h1>
</body>
</html>