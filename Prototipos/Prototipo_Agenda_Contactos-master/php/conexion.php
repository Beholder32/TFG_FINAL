<?php 

    function conectarse(){
        $servidor = "localhost";
        $usuario = "root";
        $password = "admin";
        $bd="mis_contactos";

        $conectar = new mysqli($servidor,$usuario,$password,$bd) or die("No se pudo conectar al servidor de BD MySQL");
        return $conectar;

    }

    $conexion = conectarse();

?>