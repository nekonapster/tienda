<?php
// incluimos ambos archivos para la conexion
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>


<?php

if ($_POST) {
    $Total = 0;
    $SID = session_id();
    $Email = $_POST['email'];

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {

        $Total = $Total + ($producto['PRECIO'] * $producto['CANTIDAD']);
    }
    // insert en la tabla ventas de la base de datos en donde recojo la venta de los productos.
    $sentencia = $pdo->prepare("INSERT INTO `ventas` 
                            (`ID`, `ClaveTransaccio`, `PaypalDatos`, `Fecha`, `Email`, `Total`, `Status`) 
        VALUES (NULL, :ClaveTransaccion, '', NOW(), :Email, :Total, 'pendiente');");

    $sentencia->bindParam(":ClaveTransaccion", $SID);
    $sentencia->bindParam(":Email", $Email);
    $sentencia->bindParam(":Total", $Total);
    $sentencia->execute();
    // recolecto el ultimo id de las ventas
    $idVentas = $pdo->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
        $sentencia = $pdo->prepare("INSERT INTO 
            `detalleventa` (`id`, `idVentas`, `idProducto`, `PrecioUnitario`, `Cantidad`, `Descargado`) 
            VALUES (NULL,:idVentas, :idProducto, :PrecioUnitario, :Cantidad, '0');");

        $sentencia->bindParam(":idVentas", $idVentas);
        $sentencia->bindParam(":idProducto", $producto['ID']);
        $sentencia->bindParam(":PrecioUnitario", $producto['PRECIO']);
        $sentencia->bindParam(":Cantidad", $producto['CANTIDAD']);
        $sentencia->execute();
    }

    // echo "<h3>" . $Total . "€" . "</h3>";
}

?>
</br>
<div class="jumbotron jumbotron-fluid text-center" style="background-color: rgb(220, 240, 240);">
    <h1 class="display-3">¡Confirme su compra!</h1>
    <hr class="my-4">
    <p class="lead">Esta a punto de abonar con <strong> paypal</strong> el importe de:
        <br><strong> <?php echo number_format($Total, 2) . "€"; ?> </strong>
    </p>

    </br>
    </br>
    </br>

    <p class="pb-3">
        Podras descargar la factura una vez se procese el pago.
        <br>
        <small>
            (Para cualquier duda contacte con: <strong>nekonapster@neko.com</strong>)
        </small>
    </p>
</div>


<?php include 'templates/pie.php'; ?>