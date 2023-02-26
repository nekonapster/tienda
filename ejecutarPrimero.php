<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $sql = "CREATE DATABASE $nombreBD";
  $sql = "CREATE DATABASE dimarcodb";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "<br>";
  echo "La base de datos fue creada correctamente<br>";
} catch (PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "La base de datos no se puede crear porque ya esta creada";
}


try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE TABLE `dimarcodb`.`descripcion` (`tipo_animal` VARCHAR(40) NOT NULL , `info` VARCHAR(700) NOT NULL, PRIMARY KEY (`tipo_animal`)) ENGINE = InnoDB;";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "La tabla 'Descripción' fue creada con exito <br>";
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
  echo "La tabla 'Usuarios' fue creada con exito <br>";
  echo "La tabla 'Usuarios' se lleno con usuario por defecto.<br>";
  echo "<br>";
  echo "<strong>Por favor si desea hacer login registrese<br></strong>";
} catch (PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "La tabla 'Usuarios' no pudo ser creada. Cree primero la base de datos dandole al boton 'Crear BD'";
  echo "<br>";
  echo "Si una vez creada la base de datos el problema persiste, pongase en contacto con el administrador, gracias.";
  echo "<br>";
}


try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE TABLE `dimarcodb`.`ejemplares` (`id` INT AUTO_INCREMENT, `especie` VARCHAR(40) NOT NULL , `raza` VARCHAR(40) NOT NULL , `cantidad` INT(50) NOT NULL , `precio` INT(50) NOT NULL , `imagen` VARCHAR(200) NOT NULL, PRIMARY KEY (`id`),  FOREIGN KEY (`especie`) REFERENCES `descripcion`(`tipo_animal`)) ENGINE = InnoDB;";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "<br>";
  echo "La tabla 'Mascotas' fue creada con exito <br>";
} catch (PDOException $f) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "<br>";
  echo "La tabla 'Mascota' no pudo ser creada. Cree primero la base de datos dandole al boton 'Crear BD'";
  echo "<br>";
  echo "Si una vez creada la base de datos el problema persiste, pongase en contacto con el administrador, gracias.";
  echo "<br>";
}

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $sql = "CREATE DATABASE $nombreBD";
  $sql = "
  INSERT INTO `dimarcodb`. `descripcion` (`tipo_animal`, `info`)
  VALUES
    ('perro', 'El perro doméstico proviene de un grupo ancestral común que data de hace aproximadamente treinta mil años, y desde entonces se ha extendido a todas partes del mundo. Los primeros restos fósiles de perros enterrados junto con seres humanos se encontraron en Israel, y datan de hace unos doce mil años. Desde entonces, los perros y los humanos han evolucionado conjuntamente, tanto en las culturas africanas y euroasiáticas, como en las que poblaron América y se mantuvieron sin contacto con aquellas hasta el siglo XV.'),
    ('gato', 'Como animal de compañía, es una de las mascotas más populares en todo el mundo. Debido a que su domesticación es relativamente reciente, pueden vivir en ambientes silvestres formando pequeñas colonias relacionándose con otros gatos monteses y los seres humanos no controlan el suministro de alimentos o la cría. La asociación del gato con los humanos lo condujo a figurar prominentemente en la mitología y en leyendas de diferentes culturas, incluyendo a las civilizaciones egipcia, japonesa, china y escandinava.'),
    ('ave', 'Las aves son animales vertebrados, de sangre caliente, que caminan, saltan o se mantienen solo sobre las extremidades posteriores,​ mientras que las extremidades anteriores han evolucionado hasta convertirse en alas que, al igual que muchas otras características anatómicas únicas, les permiten, en la mayoría de los casos, volar, si bien no todas vuelan. Tienen el cuerpo cubierto de plumas y, las aves sensu stricto, un pico córneo sin dientes. Para reproducirse ponen huevos que incuban hasta su eclosión.');

  
  INSERT INTO `dimarcodb`.`ejemplares` (`especie`, `raza`, `cantidad`, `precio`, `imagen`)
  
  VALUES
    ('perro','Collie','10','5','https://i.imgur.com/uyViejS.jpeg'),
    ('perro','Dogo Argentino','15','10','https://i.imgur.com/JKuew3o.jpg'),
    ('perro','Golden Doodle','20','15','https://i.imgur.com/6dSh10T.jpg'),
    ('gato','Angora','25','20','https://i.imgur.com/99zPO1H.jpg'),
    ('gato','Persa','30','25','https://i.imgur.com/7SYwZaS.jpg'),
    ('gato','Siames','35','30','https://i.imgur.com/hXn6DYb.jpg'),
    ('ave','Colibri','40','35','https://i.imgur.com/GrpkZAS.jpg'),
    ('ave','Cotorra Argentina','45','40','https://i.imgur.com/NSljPcH.jpg'),
    ('ave','Jilguero Europeo','50','45','https://i.imgur.com/rmZYOtw.jpg');
  
  INSERT INTO `dimarcodb`.`usuarios` (`user`, `pass`, `email`, `dni`, `direccion`)
  
  VALUES
    ('alejandro','rootroot','alejandro@iescamas.com','012345678E','Brisquet 1');";

  //use exec() because no results are returned
  $conn->query($sql);
  echo "La tablas se han rellenado correctamente<br>";
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "No se pudieron rellenar las tablas'";
}


?>

<html>
  <br>
  <link rel="stylesheet" href="../style.css" type="text/css" media="all" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <br>
  <span class="material-symbols-outlined">
    keyboard_return
  </span>
  <a href="./login-php/sign.php">Registrarse</a>
</html>