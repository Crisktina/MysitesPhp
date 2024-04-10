

<?php
include("head.html");
/* comentario de varias
Lineas */
//Comentario de una linea

//Sintaxis básica
echo "Hola mundo\r";
echo "Hola", "mundo\t";
print "Hola mundo\n";
print "Hola "."mundo\n";

print("<P>Párrafo 1</P>\n");
print("<P>Párrafo 2</P>\n");
echo "<br>";


//INTEGER
echo "INTEGER"."<br>";
$a = 1;
echo is_integer($a); //comprueban si una variable es de un tipo dado
echo "<br>";

$num= 9;
print ('num vale $num\n'."<br>"); // muestra num vale $a\n
print ("num vale $num\n"."<br>"); // muestra num vale 9 y avanza una línea
echo "<br>"."<br>";


//STRING
echo "STRING"."<br>";
$b= "cadena";
echo is_string($b);//comprueban si una variable es de un tipo dado
echo "<br>"."<br>";


//FLOAT
echo "FLOAT"."<br>";
$c= 2.2;
echo is_float($c);//comprueban si una variable es de un tipo dado
echo "<br>"."<br>";


//BOOLEAN
echo "BOOLEAN"."<br>";
$d=true;
$e=0;
$d='';
echo is_bool($d);//comprueban si una variable es de un tipo dado
echo "<br>";
echo is_bool($e);
echo "<br>";
echo gettype($d);//comprueban si una variable es de un tipo dado
echo "<br>"."<br>";


//ARRAY
echo "ARRAY"."<br>";
$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes",
"Sábado", "Domingo");
echo count($dias);
echo "<br>";

$diaSeleccionado = $dias[0]; // diaSeleccionado = "Lunes"
print ($diaSeleccionado."<br>"); 

$otroDia = $dias[5]; // otroDia = "Sábado“
print ($otroDia."<br>");

print_r(is_array($dias));//comprueban si una variable es de un tipo dado 1--true
echo "<br>";

$color = array( 'rojo'=>101, 'verde'=>51,
'azul'=>255);
$colorSeleccionado= $color ['rojo']; //colorSeleccionado = 101
print ($colorSeleccionado."<br>");
echo "<br>"."<br>";


//NULL
echo "NULL"."<br>";
print (is_null($a));//comprueban si una variable es de un tipo dado
echo "<br>"."<br>";

print (is_numeric($a));//comprueban si una variable es de un tipo dado

var_dump($a);//info sobre la variable


echo "<h3>Postincrement</h3>";
$a = 5;
echo "Deberia ser 5: " . $a++ . "<br />\n";
echo " Deberia  ser 6: " . $a . "<br />\n";
echo "<h3>Preincrement</h3>";
$a = 5;
echo "Deberia ser 6: " . ++$a . "<br />\n";
echo "Deberia ser 6: " . $a . "<br />\n";


echo "<h3>Postdecrement</h3>";
$a = 5;
echo "Deberia ser 5: " . $a-- . "<br />\n";
echo "Deberia ser 4: " . $a . "<br />\n";
echo "<h3>Predecrement</h3>";
$a = 5;
echo "Deberia ser 4: " . --$a . "<br />\n";
echo "Deberia ser 4: " . $a . "<br />\n";

$numero1 = 5;
$numero1 += 3; // numero1 = numero1 + 3 = 8
$numero1 -= 1; // numero1 = numero1 - 1 = 4
$numero1 *= 2; // numero1 = numero1 * 2 = 10
$numero1 /= 5; // numero1 = numero1 / 5 = 1
$numero1 %= 4; // numero1 = numero1 % 4 = 1

$visible = true;
echo !$visible; // Muestra “False" y no “True"

$cantidad = 0;
$vacio = !$cantidad; // vacio = true
$cantidad = 2;
$vacio = !$cantidad; // vacio = false
$mensaje = "";
$mensajeVacio = !$mensaje; // mensajeVacio = true
$mensaje = "Bienvenido";
$mensajeVacio = !$mensaje; // mensajeVacio = false

$valor1 = true;
$valor2 = false;
$resultado = $valor1 && $valor2; // resultado = false
$valor1 = true;
$valor2 = true;
$resultado = $valor1 && $valor2; // resultado = true

$valor1 = true;
$valor2 = false;
$resultado = $valor1 || $valor2; // resultado = true
$valor1 = false;
$valor2 = false;
$resultado = $valor1 || $valor2; // resultado = false


$x = True; // asigna el valor TRUE a $i
$y = False; // asigna el valor False a $j
$i = 0; // asigna el valor 0 a $i
if($x==$i){
echo '$i = $x = '.$i.".<br>";
}
elseif ($y==$i) {
echo '$i = $y = '.$i.".<br>";
}

$extension="pdf";
switch($extension)
{
case ("PDF");
$tipo= "Documento Adobe PDF";
break;
case ("TXT");
$tipo= "Documento de texto";
break;
case ("HTM"):
$tipo= "Documento HTML";
break;
default:
$tipo= "Archivo " . $extension;
}
print ($tipo);


$resultado = 0;
$numero = 100;
$i = 0;
while($i <= $numero) {
$resultado += $i;
$i++;
}


$numero=0;
do {
    $resultado *= $numero; // resultado = resultado * numero
    $numero--;
    } while($numero > 0);


print("<UL>\n");
for($i=1; $i<=5; $i++)
print("<LI>Elemento $i</LI>\n");
print("</UL>\n");


$color = array( 'rojo'=>101, 'verde'=>51, 'azul'=>255);
foreach($color as $valor)
print "Valor: $valor<BR>\n";
foreach($color as $clave=> $valor)
print "Clave: $clave; Valor: $valor<BR>\n";


phpinfo();
include("lastbody.html");
?>


