<?php
// incluimos ambos archivos para la conexion
include 'global/config.php';
include 'global/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import css de bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Carrito</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="index.php">Logo de la tienda</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Carrito(0)</a>
                </li>
            </ul>
        </div>
    </nav>
    </br>
    </br>
    <div class="container">
        </br>
        <div class="alert alert-success" role="alert">
            Pantalla de mensaje...
            <a href="" class="badge badge-success">Ver carrito</a>
        </div>


        <div class="row">
            <?php

            $sentencia = $pdo->prepare("SELECT * FROM `ejemplares`");
            $sentencia->execute();
            $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
     
            ?>

            <?php foreach($listaProductos as $producto){ ?>
                <div class="col-3">
                    <div class="card">

                        <img title="<?php echo $producto['raza']; ?>" alt="<?php echo $producto['raza']; ?>" src="<?php echo $producto['imagen']; ?>" class="card-img-top">

                        <div class="card-body">

                            <span> <?php echo $producto['raza']; ?> </span>
                            <h5 class="card-title"> <?php echo $producto['precio']; ?> €</h5>
                            <strong>Info</strong>
                            <p class="card-text"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa consequatur sunt illum. Iusto amet incidunt perferendis qui sunt voluptate maxime optio aspernatur distinctio, officia ipsam aperiam nesciunt praesentium fugiat dolorem.</p>

                            <button class="btn btn-primary" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
                        </div>
                    </div>
                </div>

            <?php } ?>






        </div>


        <!-- import BOOTSTRAP 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>