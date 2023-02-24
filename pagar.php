<?php
// incluimos ambos archivos para la conexion
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<?php

    if ($_POST) {
        $Total=0;
        $SID=session_id();
        $Email=$_POST['email'];
        
        foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        
            $Total=$Total+($producto['PRECIO']*$producto['CANTIDAD']);

        
        }
        // insert en la tabla ventas de la base de datos en donde recojo la venta de los productos.
        $sentencia=$pdo->prepare("INSERT INTO `ventas` 
                            (`ID`, `ClaveTransaccio`, `PaypalDatos`, `Fecha`, `Email`, `Total`, `Status`) 
        VALUES (NULL, :ClaveTransaccion, '', NOW(), :Email, :Total, 'pendiente');");

        $sentencia->bindParam(":ClaveTransaccion", $SID);
        $sentencia->bindParam(":Email", $Email);
        $sentencia->bindParam(":Total", $Total);
        $sentencia->execute();

        // recolecto el ultimo id de las ventas
        $idVentas=$pdo->lastInsertId();

echo "<h3>".$Total ."€" ."</h3>";

    }

?>



<?php
include 'templates/pie.php';
?>