<?php
    
    $usuario_introducido = $_POST["usuario_txt"];
    $password_introducido = $_POST["password_txt"];
    
    //Esta primera consulta nos dice si existe algún email registrado para poder iniciar sesion, si no existe, nos avisará de ello
    
    include("conexion.php");
    $consulta = "SELECT * FROM usuarios WHERE email='$usuario_introducido'";
    $ejecutar_consulta = $conexion->query($consulta);
    $num_regs = $ejecutar_consulta->num_rows;

    //Si el mail existe ejecutará una consulta para determinar si la contraseña introducida coincide con la de la BD

    if(!$num_regs == 0){
        echo ("El usuario existe");
        //Esta consulta obtendrá la contraseña de la cuenta introducida para poderma comprar
        $consulta = "SELECT password FROM usuarios WHERE email='$usuario_introducido'";
        $ejecutar_consulta = $conexion->query($consulta);
        while($registro = $ejecutar_consulta->fetch_assoc()){
            $password_usuario = $registro["password"];
        }
        //Con esta podremos sacar el nombre de usuario para usarlo en la sesion
        $consulta = "SELECT nombre FROM usuarios WHERE email='$usuario_introducido'";
        $ejecutar_consulta = $conexion->query($consulta);
        while($registro = $ejecutar_consulta->fetch_assoc()){
            $nombre_sesion = $registro["nombre"];
        }

        echo $password_usuario;
        //Si la contraseña coincide, se inicia la sesion
        if($password_usuario == $password_introducido){
            session_start();
            $_SESSION["autentificado"] = true;
            $_SESSION["usuario"] = $nombre_sesion;
            echo("sesion autentificada");

            header("Location: archivo-protegido.php");

        }else{
            echo ("Error al introducir contraseña");
        }

    }else{
        echo ("El usuario no existe");
    }

?>