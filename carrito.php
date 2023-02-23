<?php
session_start();
$mensaje = "";


if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje.= "OK ID: " . $ID."</br>";
            } else {
                $mensaje.= "UPS... ID inccorrecto " . $ID."</br>";
                break;
            }

            if (is_string(openssl_decrypt($_POST['raza'], COD, KEY))) {
                $RAZA = openssl_decrypt($_POST['raza'], COD, KEY);
                $mensaje .= "OK raza: " . $RAZA."</br>";
            } else { $mensaje .= "UPS... RAZA inccorrecta" . $RAZA."</br>"; break; }

            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje .= "OK precio: " . $PRECIO."</br>";
            } else { $mensaje.= "UPS...PRECIO inccorrecto " . $PRECIO."</br>"; break; }

            if (is_string(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
            
                $mensaje .= "OK cantidad: " . $CANTIDAD."</br>";
            } else { $mensaje.= "UPS... CANTIDAD inccorrecta " . $CANTIDAD."</br>";   break;}
               
            
            // la forma de almacenar la informacion del carrito es mediante una sesion. sino existe recuperamos un array en donde volcaremos todos las variables del carrito de compra y la inicializamos en la posicion 0
                if (!isset($_SESSION['CARRITO'])) {
                    // declaro un array asociativo para meter en una variable los casos del switch
                    $producto= [
                            'ID'=>$ID,
                            'RAZA'=>$RAZA,
                            'PRECIO'=>$PRECIO,
                            'CANTIDAD'=>$CANTIDAD,
                                ];
                                $_SESSION['CARRITO'][0]=$producto;

                                // forma de depositar mas productos en el carrito de compras
                            }else {
                                // cuento cuantos productos tengo en el carrito y lo almaceno en la variable $numeroProductos
                                $numeroProductos= count($_SESSION['CARRITO']);
                                $producto= [
                                    // recolectamos la informacion de cada producto y lo almacenamos en el array $producto
                                    'ID'=>$ID,
                                    'RAZA'=>$RAZA,
                                    'PRECIO'=>$PRECIO,
                                    'CANTIDAD'=>$CANTIDAD,
                                ];
                                // en este caso si producto se inicializa en 1 con mumreroProductos iremos sumando cada producto.
                                $_SESSION['CARRITO'][$numeroProductos]=$producto;
                
                }
                $mensaje=print_r($_SESSION, true);
            


            break;
    }
}