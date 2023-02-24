<?php
// incluimos ambos archivos para la conexion
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';

?>
</br>
<div class="alert alert-success" role="alert">

    <?php echo $mensaje ?>

    <a href="#" class="badge badge-dark text-secondary">Ver carrito</a>
</div>


<div class="row">
    <?php

    if (isset($_POST['perro'])) {

        $queryEjemplares = $pdo->prepare("SELECT * FROM ejemplares, descripcion WHERE  
            ejemplares.especie = descripcion.tipo_animal AND ejemplares.especie = 'perro' ;");
        $queryEjemplares->execute();
        $listaProductos = $queryEjemplares->fetchAll(PDO::FETCH_ASSOC);
    } elseif (isset($_POST['gato'])) {

        $queryEjemplares = $pdo->prepare("SELECT * FROM ejemplares, descripcion WHERE  
            ejemplares.especie = descripcion.tipo_animal AND ejemplares.especie = 'gato' ;");
        $queryEjemplares->execute();
        $listaProductos = $queryEjemplares->fetchAll(PDO::FETCH_ASSOC);
    } elseif (isset($_POST['ave'])) {

        $queryEjemplares = $pdo->prepare("SELECT * FROM ejemplares, descripcion WHERE  
            ejemplares.especie = descripcion.tipo_animal AND ejemplares.especie = 'ave' ;");
        $queryEjemplares->execute();
        $listaProductos = $queryEjemplares->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $queryEjemplares = $pdo->prepare("SELECT * FROM ejemplares, descripcion WHERE  
                ejemplares.especie = descripcion.tipo_animal;");
        $queryEjemplares->execute();
        $listaProductos = $queryEjemplares->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>



    <div class="col-10">
        <form action="programa.php" method="POST">
            <input class="btn btn-" name="todos" type="submit" value="Todos">
            <input class="btn btn-" name="perro" type="submit" value="Perros">
            <input class="btn btn-" name="gato" type="submit" value="Gatos">
            <input class="btn btn-" name="ave" type="submit" value="Aves">
        </form>
    </div>



    <?php foreach ($listaProductos as $producto) { ?>

        <div class="col-3">
            <div class="card">

                <img data-toggle="popover" data-contet="<?php echo $info['info']; ?>" data-trigger="hover" title="<?php echo $producto['raza']; ?>" alt="<?php echo $producto['raza']; ?>" src="<?php echo $producto['imagen']; ?>" class="card-img-top" height="250px">



                <div class="card-body">

                    <span> <?php echo $producto['raza']; ?> </span>
                    <h5 class="card-title"> <?php echo $producto['precio']; ?> €</h5>
                    <strong>Info</strong>
                    <p class="card-text"><?php echo $producto['info']; ?> </p>

                    <form action="" method="POST">
                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                        <input type="hidden" name="raza" id="raza" value="<?php echo openssl_encrypt($producto['raza'], COD, KEY); ?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt($producto['cantidad'], COD, KEY); ?>">
                        <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>

                    </form>


                </div>
            </div>
            <!-- el br inferior provoca un espacio entre la fila superior y la inferior -->
            </br>
        </div>
    <?php } ?>



</div>


<!-- import BOOTSTRAP 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- import script js de un tooltip o popover de bootstrap 4 -->
<script>
    $(function() {
        $('.example-popover').popover({
            container: 'body'
        })
    })
</script>
<?php

include 'templates/pie.php';

?>