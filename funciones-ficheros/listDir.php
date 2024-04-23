<!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>

            <?php
            
           

            if (!isset($_GET['theFolder'])) {
                 $theFolder = "C:/xampp/htdocs/MysitesPhp/";
            } else {
                $theFolder = $_GET['theFolder'];
            }
            

            ?>
            <H1><?=$theFolder?></H1>
            <?php
            if (is_dir($theFolder)){
                if ($gestor = opendir($theFolder)){

                ?>

                <table border=1>

                    <?php
                    while (($theFile = readdir($gestor)) !== false){
                        if (!($theFile=="." || $theFile=="..")) {
                            
                            $info = pathinfo($theFolder.$theFile);
                            $name = basename($theFolder.$theFile);
                            $size = filesize($theFolder.$theFile);
                            $lastDate = date("Y-m-d", filemtime($theFolder.$theFile));
                            if (is_dir($theFolder.$theFile)) {
                                ?>
                                    <TR><TD><a href="http://localhost/MysitesPhp/funciones-ficheros/listDir.php?theFolder=<?=$theFolder.$theFile?>/">
                                    <?=$name?></a></TD><TD></TD><TD><?= $size; ?></TD><TD><?=$lastDate?></TD>
                                <?php
                            }
                            else {
                                ?>
                                <TR><TD><?=$name?></TD><TD><?php if($ext = $info['extension']) echo $ext; ?></TD><TD><?= $size; ?></TD><TD><?=$lastDate?></TD>

                                <?php
                            }
                        }
                    }
                    ?>      
                            </TR>
                <?php
                    closedir($gestor);
                }
            }
            ?>
            </table>
       
    </body>
</html>