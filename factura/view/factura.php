<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../includes/generatePdf.php">Generar Factura en PDF</a>

    <form action="../includes/generatePdf.php">

        <label for="invoice">Elige una factura para enviar al cliente:</label>
        
             <?php
             require_once '../includes/autoload.models.php';
             require_once '../includes/autoload.controlers.php';
             $comandaContr = new ComandaContr();
             $comandes = $comandaContr->getComandes();
             ?>
        <select name="invoice" >
        <!-- foreach de num factura -->
         <?php foreach ($comandes as $comanda) { 
            ?>
            <option value=<?=htmlspecialchars($comanda['numcomanda'])?>><?=htmlspecialchars($comanda['numcomanda'])?></option>
        <?php } ?>
        </select>
        <input type="submit">
    </form>
</body>
</html>