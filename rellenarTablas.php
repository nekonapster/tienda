<?php
$servername = "localhost";
$username = "profesor";
$password = "";

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
  ('ave','Jilguero Europeo','50','45','https://i.imgur.com/rmZYOtw.jpg');";

  //use exec() because no results are returned
  $conn->query($sql);
  echo "La tabla 'Ejemplares' se ha rellenado correctamente<br>";
} catch (PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
  echo "No se pudo rellenar la tabla 'Ejemplares'";
}

$conn = null;

?>

<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<br>
<span class="material-symbols-outlined">
  keyboard_return
</span>
<a href="index2.php">Back</a>

</html>