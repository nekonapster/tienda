<?php
$servidor= "mysql:dbname=". BD.";host=". SERVIDOR;

try {
    $pdo= new PDO($servidor, USUARIO, PASSWORD,
    // array para cambiar los valores de utf8 que me sirve para eliminar caracteres extraños
    array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8")
);
    // pequeño script para lanzar un alert 
    //echo "<script>alert('Conectando...')</script>";
    
} catch (PDOException $e) {
    // pequeño script para lanzar un alert 
    //echo "<script>alert('Error...')</script>";
    
}
