<?php
session_start();
$mensaje = "";


if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case "Agregar":

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "OK ID: " . $ID . "</br>";
            } else {
                $mensaje .= "UPS... ID inccorrecto " . $ID . "</br>";
                break;
            }

            if (is_string(openssl_decrypt($_POST['raza'], COD, KEY))) {
                $RAZA = openssl_decrypt($_POST['raza'], COD, KEY);
                $mensaje .= "OK raza: " . $RAZA . "</br>";
            } else {
                $mensaje .= "UPS... RAZA inccorrecta" . $RAZA . "</br>";
                break;
            }

            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje .= "OK precio: " . $PRECIO . "</br>";
            } else {
                $mensaje .= "UPS...PRECIO inccorrecto " . $PRECIO . "</br>";
                break;
            }

            if (is_string(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);

                $mensaje .= "OK cantidad: " . $CANTIDAD . "</br>";
            } else {
                $mensaje .= "UPS... CANTIDAD inccorrecta " . $CANTIDAD . "</br>";
                break;
            }


            // la forma de almacenar la informacion del carrito es mediante una sesion. sino existe recuperamos un array en donde volcaremos todos las variables del carrito de compra y la inicializamos en la posicion 0
            if (!isset($_SESSION['CARRITO'])) {
                // declaro un array asociativo para meter en una variable los casos del switch
                $producto = [
                    'ID' => $ID,
                    'RAZA' => $RAZA,
                    'PRECIO' => $PRECIO,
                    'CANTIDAD' => $CANTIDAD,
                ];
                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado correctamente al carrito";
                // forma de depositar mas productos en el carrito de compras
            } else {
                //con el primer if compruebo que el carrito no tenga ya un producto (asi evito llenar el carrito dos vewces con el mismo producto)
                
                // uso la funcion arrau_column para meter todos los id que estan en el carrito
                $idProductos = array_column($_SESSION['CARRITO'], "ID");
                
                // con este condicional pregunto si en el array los ID de los productos ya estan almacenados en mi variable idProductos y muestro un mensaje por medio de un alert
                if (in_array($ID, $idProductos)) {
                    echo "<script>alert('El producto ya fue seleccionado, elija otro o finalice su compra.')</script>";
                    $mensaje = "";

                } else {


                    // cuento cuantos productos tengo en el carrito y lo almaceno en la variable $numeroProductos
                    $numeroProductos = count($_SESSION['CARRITO']);
                    $producto = [
                        // recolectamos la informacion de cada producto y lo almacenamos en el array $producto
                        'ID' => $ID,
                        'RAZA' => $RAZA,
                        'PRECIO' => $PRECIO,
                        'CANTIDAD' => $CANTIDAD,
                    ];
                    // en este caso si producto se inicializa en 1 con mumreroProductos iremos sumando cada producto.
                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                    $mensaje = "Producto agregado correctamente al carrito";
                }
            }
            //$mensaje = print_r($_SESSION, true);
            $mensaje = "Producto agregado correctamente al carrito";



            break;
        case "Eliminar":
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);

                // evaluo los valores de todos los productos que coinciden con el indice para eliminarlo de la variable de sesion.
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]);
                        echo "<script>alert('Producto eliminado con exito');</script>";
                    }
                }
            } else {
                $mensaje .= "UPS... ID inccorrecto " . $ID . "</br>";
            }
            break;
    }
}
