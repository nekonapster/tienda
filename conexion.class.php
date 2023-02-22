<?php
    class Conexion {
        public $conexion;

        function __construct($user, $pwd, $bd="")
        {
            try {
                //primer parametro. Tipo de BD, host y el nombre
                $dsn = "mysql:host=localhost;dbname=$bd";
                //3 parámetros. Conexión, usuario, contraseña
                $this->conexion = new PDO($dsn, $user, $pwd);
                //establecer el tipo de control de errores
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<h1>Conexión realizada</h1>";
                //si hay errores
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                $this->conexion=null;
            } //fin control errores
        }
    }
?>