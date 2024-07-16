<?php 
require "autoload.models.php";
require "autoload.controlers.php";

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])){

$numComanda = $_POST[''];
$comandaContr = new ComandaContr();
$comandaContr->generateInvoice($numComanda);

}

?>