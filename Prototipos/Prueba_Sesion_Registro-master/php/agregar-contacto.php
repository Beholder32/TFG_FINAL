<?php

    //Se asignan los valores recogidos en el formulario (el identificador del valor recogido es el 'name') a variables
    $nombre = $_POST["nombre_txt"];
    $email = $_POST["email_txt"];
    $password = $_POST["password_txt"];
    $sexo = $_POST["sexo_rdo"];
    $posicion = $_POST["posicion_slc"];

    include("conexion.php");
    $consulta = "SELECT * FROM usuarios WHERE email='$email'";
    $ejecutar_consulta = $conexion->query($consulta);
    $num_regs = $ejecutar_consulta->num_rows;

    if($num_regs == 0){
        $consulta = "INSERT INTO usuarios (nombre,email,password,sexo,puesto) VALUES ('$nombre','$email','$password','$sexo','$posicion');";
        $ejecutar_consulta = $conexion->query($consulta);
    }else{
        echo ("Hay un usuario ya registrado con el emil <b>$email</b>");
    }
    
    $conexion->close();
    header("Location: ../index.php");
    

?>