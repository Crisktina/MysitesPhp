<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<?php 


//recoger datos del post
if(isset($_POST['user']) && isset($_POST['pass'])){
    include_once "conexion.php";
    $user = $_POST['user'];
    $password = $_POST['pass']; 
    //consulta de datos
    $consulta = "SELECT * FROM user WHERE username='$user' AND password='$password'";
    //echo $consulta;
    //Acceso si o no...
    if(isset($consulta)){
        
        $result = mysqli_query ($conexion, $consulta) or die ("Fallo en la consulta");
        //echo $result->num_rows;
        if($result->num_rows==1){
            echo "incio de sessión";
            header('Location: index.php');
        }
        
        
    
    } else {
        header('Location: login.php');
        echo "Usuario y password incorrectos";
    }
    include_once "cerrarConexion.php";
}

//usuario = Cristina/// Password =password

// Array asociativo
// $fila = mysqli_fetch_array($result , MYSQLI_ASSOC);
// print($fila['username']."<br>");
// print($fila['password']."<br>");

?>
<body>
    <h1>Login</h1>
    <form method="POST">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user">
        <label for="pass">Password:</label>
        <input type="password" name="pass" id="pass">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>