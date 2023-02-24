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
                    <a class="nav-link" href="mostrarCarrito.php">Carrito (<?php
                    
                    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);

                    ?>) </a>
                </li>
            </ul>
        </div>
    </nav>

    </br>
    </br>

    <div class="container">