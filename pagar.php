<?php
session_start();

// incluimos ambos archivos para la conexion
include './login-php/db.php';
// include 'global/config.php';
// include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';


if(!isset($_SESSION['user_id'])){
    header("Location: login-php/logout.php");
    }
?>

</br>
<div class="jumbotron jumbotron-fluid text-center" style="background-color: rgb(220, 240, 240);">
    <h1 class="display-3">¡Ya casi terminamos!</h1>
    <hr class="my-4">
</p>



<a type="button" class="btn btn-lg btn-warning" href="comprar.php">Confirmar el donativo</a>


 <!-- Set up a container element for the button -->
 <div id="paypal-button-container"></div>
    </br>
    </br>
    </br>

    <p class="pb-3">
        Podras descargar su comprobante del donativo una vez se procese el pago.
        </br>
        <small>
            (Para cualquier duda contacte con: <strong>nekonapster@neko.com</strong>)
        </small>
    </p>
</div>


<?php include 'templates/pie.php'; ?>