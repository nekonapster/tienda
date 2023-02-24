<?php
$servername = "localhost";
$username = "profesor";
$password = "";

try {
  $conn3 = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql3 = "CREATE TABLE `dimarcodb`.`descripcion` (`tipo_animal` VARCHAR(40) NOT NULL , `info` VARCHAR(700) NOT NULL, PRIMARY KEY (`tipo_animal`)) ENGINE = InnoDB;";

  // use exec() because no results are returned
  $conn3->exec($sql3);
  echo "La tabla 'Descripión' fue creada con exito <br>";
} catch (PDOException $g) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "<br>";
  echo "La tabla 'Descripción' no pudo ser creada. Cree primero la base de datos dandole al boton 'Crear BD'";
  echo "<br>";
  echo "Si una vez creada la base de datos el problema persiste, pongase en contacto con el administrador, gracias.";
  echo "<br>";
}

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE TABLE `dimarcodb`.`usuarios` (`id` INT(100) NOT NULL AUTO_INCREMENT , `user` VARCHAR(40) NOT NULL , `pass` VARCHAR(50) NOT NULL , `email` VARCHAR(40) NOT NULL, `dni` VARCHAR(10) NOT NULL , `direccion` VARCHAR(50) NOT NULL , PRIMARY KEY (`id`));";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "La tabla 'Usuario' fue creada con exito <br>";
} catch (PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "La tabla 'Usuarios' no pudo ser creada. Cree primero la base de datos dandole al boton 'Crear BD'";
  echo "<br>";
  echo "Si una vez creada la base de datos el problema persiste, pongase en contacto con el administrador, gracias.";
  echo "<br>";
}

$conn = null;

try {
  $conn2 = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql2 = "CREATE TABLE `dimarcodb`.`ejemplares` (`id` INT AUTO_INCREMENT, `especie` VARCHAR(40) NOT NULL , `raza` VARCHAR(40) NOT NULL , `cantidad` INT(50) NOT NULL , `precio` INT(50) NOT NULL , `imagen` VARCHAR(200) NOT NULL, PRIMARY KEY (`id`),  FOREIGN KEY (`especie`) REFERENCES `descripcion`(`tipo_animal`)) ENGINE = InnoDB;";

  // use exec() because no results are returned
  $conn2->exec($sql2);
  echo "La tabla 'Mascotas' fue creada con exito <br>";
} catch (PDOException $f) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "<br>";
  echo "La tabla 'Mascota' no pudo ser creada. Cree primero la base de datos dandole al boton 'Crear BD'";
  echo "<br>";
  echo "Si una vez creada la base de datos el problema persiste, pongase en contacto con el administrador, gracias.";
  echo "<br>";
}

$conn2 = null;




$conn3 = null;




?>

<html>

<br>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<br>
<span class="material-symbols-outlined">
  keyboard_return
</span>
<a href="index2.php">Back</a>

</html>