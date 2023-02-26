<?php

include './login-php/db.php';
// include 'global/config.php';
include './carrito.php';
include './cabecera.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login-php/logout.php");
    }

?>

</br>
<h3>Lista de adopción</h3>
<?php
//Checkea si el boton vaciar fue pulsado y recarga la pagina vaciando la sesion
//funcionaria sin recargar, pero recarga para que se actualice el numero del carrito
if(isset($_POST['btnVacia'])){
$_SESSION['CARRITO']=[];
header('Location: #');
}
if (!empty($_SESSION['CARRITO'])) { ?>
    <form method="post">
    <input class="btn btn-secondary btn-lg btn-block" type="submit" value="Vaciar Cesta" name="btnVacia"></button></br></br>
    </form>

    <table class="table table-light table-bordered">
        <tbody>

            <tr>
                <th width="40%">Descripción</th>
                <th width="15%" class="text-center">Donativo</th>
                <th width="20%" class="text-center">Accion</th>
            </tr>
            <?php $total = 0; ?>

            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>

                <tr>
                    <td width="40%"> <?php echo $producto['RAZA'] ?> </td>
                    <td width="40%" class="text-center"><?php echo $producto['PRECIO'] ?>€</td>
                    <td width="20%" class="text-center">

                        <!-- formulario con boton para eliminar productos del carrito, recoge el id y lo encripta para luego compararlo asi borrarlo  -->
                        <form action="" method="post">
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                            <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                        </form>


                    </td>
                </tr>
                <?php $total = $total + $producto['PRECIO']; ?>
            <?php } ?>

            <tr>
                <td colspan="3" align="right">
                    <h3>Total: <?php echo number_format($total, 2) ?> €</h3>
                </td>
                
            </tr>

            <tr>
                <td colspan="5">
                    <form action="pagar.php" method="post">
                      <button class="btn btn-primary btn-lg btn-block" type="submit" value="pagar" name="btnAccion">Donar >></button>
                    </form>
                </td>
            </tr>


        </tbody>
    </table>

<?php } else { ?>
    <div class="alert alert-success" role="alert">
        Lista sin adopciones...
    </div>
<?php } ?>



<?php
include './pie.php';
?>