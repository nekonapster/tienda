<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- import css -->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
    <!-- import google icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Admin base de datos</title>
</head>

<body>
    <form action="eliminarBD.php" method="POST">
        <p class="material-symbols-outlined">
            looks_one
        </p>
        </br>
        <label for="eliminarBD">Elimine la Base de Datos</label>
        <br>
        <label for="eliminarBD">(Es una buena practica eliminar la posible base de datos).</label>
        <br>
        <input type="submit" value="Eliminar BD">
    </form>
    <form action="crearBD.php" method="POST">
        <p class="material-symbols-outlined">
            looks_two
        </p>
        </br>
        <label for="nombreBD">Cree la Base de Datos</label>
        </div>
        <br>
        <input type="submit" value="Crear BD">
    </form>
    <form action="crearTablas.php" method="POST">
        <p class="material-symbols-outlined">
            looks_3
        </p>
        </br>
        <label for="crearTbl">Cree las tablas</label>
        <br>
        <input type="submit" name="crearTbl" value="Crear Tablas">
    </form>
    <form action="rellenarTablas.php" method="POST">
        <p class="material-symbols-outlined">
            looks_4
        </p>
        </br>
        <label for="crearTbl">Rellene las tablas</label>
        <br>
        <input type="submit" name="rellenarTbl" value="Rellenar Tablas">
    </form>

    <p class="material-symbols-outlined">
        looks_5
    </p>
    </br>
    <label>Ejecutar el programa</label>
    </br>
    </br>
    <a href='./login-php/index.php' class="btnPrograma">Ir a Programa</a>


</body>

</html>