<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola <?= $_POST['name'] ?></h1>
    <p><a href="<?=$nombreDirectorio.$nombreFichero ?>">FILE</a></p>
</body>
</html>


<?php 

// $name =  $_POST("name");
// $category =  $_POST("category");
// $subcategory =  $_POST("subcategory");
// $price =  $_POST("price");


print_r($_POST);
echo "<br>";
echo "<br>";
print_r($_FILES);
echo "<br>";
echo "<br>";

if(isset($_POST["enviar"])){
    If (is_uploaded_file($_FILES['fileIMG']['tmp_name']))
    {//si se ha subido el fichero….
        $nombreDirectorio= "../archivos/";
        $idUnico= time();
        $nombreFichero= $idUnico. "-" . $_FILES['fileIMG']['name'];
        // move
        $subido = move_uploaded_file($_FILES['fileIMG']['tmp_name'], $nombreDirectorio.$nombreFichero);
        if(!$subido) {
            print("No se ha podido mover el fichero a la carpeta definitiva\n".$_FILES['fileIMG']['error']);
        } else
        print("Archivo subido a la tu carpeta\n");
        
    } else
        print("No se ha podido subir el fichero a la carpeta temporal\n");
    
    
} else 
    echo "No se ha podido enviar el formulario."



?>