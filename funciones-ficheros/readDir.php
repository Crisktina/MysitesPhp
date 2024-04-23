<?php
$theFile = './carpeta1/theFile.txt';

if ($gestor = fopen($theFile, 'r')) {
  while (($line = fgets($gestor)) !== false) {
    echo $line."<BR>";
  }
  fclose($gestor);
}
?>