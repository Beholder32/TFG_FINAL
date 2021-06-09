<?php
    include("conexion.php");
    include("sesion.php");
    $email = $_SESSION["email"];
    $consulta = "DELETE FROM usuarios WHERE email = '$email'";
    $ejecutar_consulta = $conexion->query($consulta);
    if($ejecutar_consulta){
        $mensaje = "El contacto con el email <b>$email</b> ha sido eliminado";
    }else{
        $mensaje = "El contacto con el email <b>$email</b> no se pudo eliminar";
    }
    $conexion->close();
    header("Location: ../index.php?op=baja&mensaje=$mensaje");
?>