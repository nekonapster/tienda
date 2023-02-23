<?php
// incluimos ambos archivos para la conexion
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import google icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!-- import css de bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Carrito</title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <!-- agrego un style como atributo para separar el logo de la tienda del borde de la pagina -->
        <a class="navbar-brand" href="index.php" style="margin-left: 8%;"><span class="material-symbols-outlined">
                sound_detection_dog_barking
            </span>- GuauMiauPiuPiu</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <!-- modifica el link siguiente para usar 'home' para redirigir a donde quier -->
                    <a class="nav-link" href="programa.php">Home</a>
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

                        <img data-toggle="popover" data-contet="<?php echo $info['info']; ?>" data-trigger="hover" title="<?php echo $producto['raza']; ?>" alt="<?php echo $producto['raza']; ?>" src="<?php echo $producto['imagen']; ?>" class="card-img-top">

                        <div class="card-body">

                            <span> <?php echo $producto['raza']; ?> </span>
                            <h5 class="card-title"> <?php echo $producto['precio']; ?> €</h5>
                            <strong>Info</strong>
                            <p class="card-text"><?php echo $producto['info']; ?> </p>

                            <form action="" method="POST">
                                <input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                                <input type="text" name="raza" id="raza" value="<?php echo openssl_encrypt($producto['raza'], COD, KEY); ?>">
                                <input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'], COD, KEY); ?>">
                                <input type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt($producto['cantidad'], COD, KEY); ?>">
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
</body>

</html>