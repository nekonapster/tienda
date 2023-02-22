<?php
$servername = "localhost";
$username = "profesor";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // $sql = "CREATE DATABASE $nombreBD";
  $sql = "CREATE DATABASE dimarcodb";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "La base de datos fue creada correctamente<br>";
} catch (PDOException $e) {
  //   echo $sql . "<br>" . $e->getMessage();
  echo "La base de datos no se puede crear porque ya esta creada";
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