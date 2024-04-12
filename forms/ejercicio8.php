<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.error {color: #FF0000;}
</style>
    <title>Document</title>
</head>
<body>
    
<?php
// Dado un formulario con los campos:
//     Nombre *: text
//     Apellidos : text
//     Edad: number
//     Email *: text
//     Comentarios: textarea
//  - Comprobar que los datos con asterisco son introducidos sino 
//  mostrar un error junto al campo.
//  - Si se ha introducido la edad (recordemos que es opcional ), debe 
//  ser mayor o igual de 18, sino mostrar un error junto al campo. Sino 
//  se ha introducido se debe saltar esta comprobación.
//  - Cuando se devuelve el formulario con o sin errores debe estar 
//  rellenado para evitar que el usuario olvide que ha introducido


$nombre = $email = $edad = $apellidos = $comentarios = "";
$nombreErr = $emailErr = $edadErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["nombre"])) {
        $nombreErr = "El nombre es obligatorio";
    } elseif (isset($_POST["nombre"])) {
        $nombre = test_input($_POST["nombre"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "El email es obligatorio";
    }
    elseif (isset($_POST["email"])) {
        $email = test_input($_POST["email"]);
        if (empty($_POST["email"]) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de email invalido";
        }
    }
   
    if (is_numeric($_POST["edad"]) < 18) {
        $edadErr = "El usuario debe ser mayor de 18 años.";
    } elseif (isset($_POST["edad"])) {
        $edad = test_input($_POST["edad"]);
    }

    if (isset($_POST["apellidos"])) {
        $apellidos = $_POST["apellidos"];
    }
    if (isset($_POST["comentarios"])) {
        $comentarios = $_POST["comentarios"];
    }

}

  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<label for="nombre">Nombre:</label><br>
<input type="text" name="nombre" id="nombre"> <span class="error"> * <?php echo $nombreErr;?></span> <br><br>

<label for="apellidos">Apellidos:</label><br>
<input type="text" name="apellidos" id="apellidos"><br><br>

<label for="edad">Edad:</label><br>
<input type="number" name="edad" id="edad"><span class="error"> * <?php echo $edadErr;?></span><br><br>

<label for="email">Email:</label><br>
<input type="email" name="email" id="email"><span class="error"> * <?php echo $emailErr;?></span><br><br>

<label for="comentarios">Comentarios:</label><br>
<textarea name="comentarios" id="comentarios" cols="30" rows="10"></textarea><br><br>
<input type="submit" value="Enviar">
</form>

<?php
echo "<h2>Resultado:</h2>";
echo $nombre;
echo "<br>";
echo $apellidos;
echo "<br>";
echo $edad;
echo "<br>";
echo $email;
echo "<br>";
echo $comentarios;

?>


</body>
</html>