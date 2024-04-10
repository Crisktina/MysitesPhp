<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
// -Mediante un campo de texto y uno de password, comprobaremos las credenciales de un usuario
// - El usuario deberá ser “USER” y la password “PASSWORD”.
// - Si se introducen correctamente devuelve un mensaje de OK en verde.
// - Si se introducen incorrectamente devuelve un mensaje de ERROR en rojo.

$user = "";
$password = "";

if (isset($_POST["enviar"]) && isset($_POST["userName"]) && isset($_POST["password"])) {
    $user = $_POST["userName"];
    $password = $_POST["password"];
    if ($user == "USER" && $password == "PASSWORD") {
        echo "<p style=\"color:green;\">OK</p>";
    } else {
        echo "<p style=\"color:red;\">ERROR</p>";
    }
    
} else if (isset($_POST["enviar"])) {
    echo "Introduce datos";
}

?>


<form method="post">

<label for="userName">Nombre de usuario:</label>
<input type="text" name="userName" value="<?php $user;?>">
<br><br>
<label for="contrasena">Contraseña:</label>
<input type="password" name="password" value="<?php $password;?>">
<br><br>
<input type="submit" name="enviar" value="Enviar">



</form>

</body>
</html>