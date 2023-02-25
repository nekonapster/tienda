<?php
require 'login-php/db.php';
session_start();

$productos = "";
$precio = 0;
//Modifica el stock de cada producto en la cesta restandole uno, es decir, el maximo que se puede comprar
foreach ($_SESSION['CARRITO'] as $indice => $producto) {
   
    
    
    $sql= "UPDATE ejemplares SET cantidad = (cantidad-1) WHERE raza=:raza";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':raza', $producto['RAZA']);
    $stmt->execute();


    $productos .= "Raza: " . $producto['RAZA'] . "\nPrecio: " . $producto['PRECIO']."€\n\n";
    $precio=$producto['PRECIO']+$precio;
}


  $email =  $_SESSION["user_email"];
  $fecha = new DateTime();
  $fechaF= $fecha->format('d_m_Y-H_i_s');
  $fecha= $fecha->format('d/m/Y H:i:s');



  $info = "------------------------------------------------\n
  ID: -" . "

Cliente: ".$email."\n
" . $productos . "
Precio total: " . $precio . "€\n
Fecha y hora de compra: " . $fecha."\n\n------------------------------------------------";



  $factura = fopen("facturas/".$email."-".$fechaF.".txt", "w");
  fwrite($factura, $info);
  fclose($factura);


   $_SESSION['CARRITO']=[];
      //falta poner el alert
    $_SESSION['COMPRAHECHA'] = "";
    header('Location: programa.php');
     
?>