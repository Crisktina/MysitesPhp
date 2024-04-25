<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <title>Document</title>
        </head>
        <body>
        <form>
            <label for="newName">Escribe el nombre y la extensión que deseas poner al archivo a modificar:</label>
            <br>
            <input type="text" name="newName" value="nouFitxer.txt">
        </form>

            <?php
            if (!isset($_GET['theFolder'])) {
                 $theFolder = "borrarDocs/";
            } else {
                $theFolder = $_GET['theFolder'];
            }
            
            if(isset($_GET["op"])){
                if($_GET["op"]=="delete"){
                    $file2Delete = $_GET['file'];
                    if(unlink($theFolder.$file2Delete)){
                        echo "<h2>Archivo eliminado</h2>";
                    } else {
                        echo "<h2>No se ha podido borrar el archivo</h2>";
                    } 
                } else if ($_GET["op"]=="rename") {
                    $theFile = $_GET["file"];
                    $newName = $_GET["newName"];
                   if (rename($theFolder.$theFile, $theFolder.$newName)){
                    echo "<h2>El archivo: <strong>$theFile</strong> se le ha cambiado el nombre por: <strong>$newName</strong></h2>";
                   } else {
                    echo "<h2>No se ha podido cambiar el nombre del archivo</h2>";
                   }
                } else if ($_GET["op"]=="modify"){
                    $txtFile = $_GET["file"];
                    $contenidoTxt = file_get_contents($theFolder.$txtFile);
                    ?>
                    <form action="tablaBorrarDir.php?op=upload" method="POST">
                        <input type="hidden" name="theFolder" value="<?=$theFolder?>">
                        <input type="hidden" name="file" value="<?=$txtFile?>">
                        <br>
                        <label for="uploadFile">Modifica el archivo: <strong><?=$txtFile?></strong>:</label> <br>
                        <textarea type="text" name="contentFile" value="contenidoFile"><?=$contenidoTxt?></textarea> <br>
                        <input type="submit" name="enviar">
                    </form> 
                <?php
                } 
                if ($_GET["op"]=="upload") {
                    $newTxtFolder = $_POST["theFolder"];
                    $newTxtFile = $_POST["file"];
                    $newContentFile = $_POST["contentFile"];
                    file_put_contents($newTxtFolder.$newTxtFile,$newContentFile);  
                }
            }

            ?>
            <H1><?=$theFolder?></H1>
            <?php
            if (is_dir($theFolder)){
                if ($gestor = opendir($theFolder)){
                ?>
                
                <table border=1>
                <tr>
                    <th>Nom</th>
                    <th>Extensió</th>
                    <th>Tamany</th>
                    <th>Data</th>
                </tr>

                    <?php
                    while (($theFile = readdir($gestor)) !== false){
                        if (!($theFile=="." || $theFile=="..")) {
                            
                            $fullPath = $theFolder.$theFile;
                            $ext = pathinfo($fullPath, PATHINFO_EXTENSION);
                            $name = basename($fullPath);
                            $size = filesize($fullPath);
                            $lastDate = date("Y-m-d", filemtime($fullPath));

                            if (is_dir($fullPath)) {
                                ?>
                                    <TR>
                                    <TD><a href="?theFolder=<?=$theFolder.$theFile?>/"><?=$name?></a></TD>
                                    <TD></TD>
                                    <TD><?=$size?></TD>
                                    <TD><?=$lastDate?></TD>
                                    <TD></TD>
                                    <TD></TD>
                                <?php
                            } else {
                                ?>
                                <TR>
                                    <TD><?php if ($ext == "txt"){
                                        echo "<a href=\"?theFolder=$theFolder&op=modify&file=$theFile\">$name</a>";
                                    } else if($ext == "pdf") echo $name; else echo $name;?></TD>
                                    <TD><?=$ext?></TD>
                                    <TD><?=$size?></TD>
                                    <TD><?=$lastDate?></TD>
                                    <TD><a href="?theFolder=<?=$theFolder?>&op=delete&file=<?=$theFile?>"><i class="material-icons">delete</i></a></TD>
                                    <TD><a onclick="javacript:updateFile('<?=$theFile?>')"><span class="material-icons">create</span></a></TD>
                                <?php
                            }
                        }
                    }
                    ?>      
                            </TR>
                <?php
                    closedir($gestor);
                }
            }else{
                echo "NO ok";
            }
            ?>
            </table>
       <script src="./editar.js"></script>
    </body>
</html>

<!-- 
4. descargar archivos pdf
5. ordenar por columnas
-->