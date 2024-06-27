<?php 

print_r($_POST);
echo "<br>";
echo "<br>";
print_r($_FILES);
echo "<br>";
echo "<br>";

if(isset($_POST["enviar"])){
    if (is_uploaded_file($_FILES['fileIMG']['tmp_name']))
    {//si se ha subido el fichero….
        $nombreDirectorio= "../archivos/";
        $idUnico= time();
        $nombreFichero= $idUnico. "-" . $_FILES['fileIMG']['name'];
        // move
        $subido = move_uploaded_file($_FILES['fileIMG']['tmp_name'], $nombreDirectorio.$nombreFichero);
        if(!$subido) {
            print("No se ha podido mover la imagen a la carpeta definitiva\n".$_FILES['fileIMG']['error']);
        } else
        print("Archivo subido a la tu carpeta\n");
        
    } else
        print("No se ha podido subir la imagen a la carpeta temporal\n");
    
    
} else 
    echo "No se ha podido enviar el formulario."



?>