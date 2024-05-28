<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<?php 

//recoger datos del post
if(isset($_POST['user']) && isset($_POST['pass'])){
    $user = $_POST['user'];
    $contraseña = $_POST['pass']; 
    //consulta de datos
    include_once "conexion.php";
    $consulta = "INSERT INTO user (username, password) VALUES ('$user','$contraseña');";
    //echo $consulta;

    //Acceso si o no...
    if(isset($consulta)){
    
        $result = mysqli_query ($conexion, $consulta) or die ("Fallo en la consulta");
        //print_r($result);
        if($result==1){
             echo "incio de sessión";
            header('Location: index.php');
        }

    } else {
    header('Location: registro.php');
    echo "No te has registrado con exito";
    }
    include_once "cerrarConexion.php";
}
?>
<body>
    <h1>Registro</h1>
    <form method="POST">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user">
        <label for="pass">Password:</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>