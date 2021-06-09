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
        $consulta = "SELECT nombre,apellidos,edad,altura,peso,sexo,id_programa,email,password,foto FROM usuarios WHERE email='$usuario_introducido'";
        $ejecutar_consulta = $conexion->query($consulta);
        while($registro = $ejecutar_consulta->fetch_assoc()){
            $nombre_sesion = $registro["nombre"];
            $apellidos_sesion = $registro["apellidos"];
            $edad_sesion = $registro["edad"];
            $altura_sesion = $registro["altura"];
            $peso_sesion = $registro["peso"];
            $sexo_sesion = $registro["sexo"];
            $id_programa_sesion = $registro["id_programa"];
            $email_sesion = $registro["email"];
            $foto_sesion = $registro["foto"];
        }

        $fecha = date("l");
        
        switch($fecha){
            case "Monday":
                $dia_elegido = "lunes";
                break;
            case "Tuesday":
                $dia_elegido = "martes";
                break;
            case "Wednesday":
                $dia_elegido = "miercoles";
                break;
            case "Thursday":
                $dia_elegido = "jueves";
                break;
            case "Friday":
                $dia_elegido = "viernes";
                break;
            case "Saturday":
                $dia_elegido = "finsemana";
                break;
            case "Sunday":
                $dia_elegido = "finsemana";
                break;
        }

        //Esta parte va a seleccionar el programa que corresponda al dia de la semana.
        $consulta2 = "SELECT nombre_programa, $dia_elegido FROM programas WHERE id_programa='$id_programa_sesion'";
        $ejecutar_consulta2 = $conexion->query($consulta2);
        while($registro = $ejecutar_consulta2->fetch_assoc()){
            $programa_sesion = $registro["nombre_programa"];
            $ejercicios_sesion = $registro[$dia_elegido];
        }

        echo $password_usuario;
        //Si la contraseña coincide, se inicia la sesion
        if($password_usuario == $password_introducido){
            session_start();
            $_SESSION["autentificado"] = true;
            $_SESSION["usuario"] = $nombre_sesion;
            $_SESSION["apellidos"] = $apellidos_sesion;
            $_SESSION["edad"] = $edad_sesion;
            $_SESSION["altura"] = $altura_sesion;
            $_SESSION["peso"] = $peso_sesion;
            $_SESSION["sexo"] = $sexo_sesion;
            $_SESSION["id_programa"] = $programa_sesion;
            $_SESSION["email"] = $email_sesion;
            $_SESSION["foto"] = $foto_sesion;
            $_SESSION["dia"] = $dia_elegido;
            $_SESSION["dia-ingles"] = $fecha;
            $_SESSION["ejercicios"] = $ejercicios_sesion;

            echo("sesion autentificada");

            header("Location: profile.php");
            //header("Location: sesion-ejemplo.php");

        }else{
            echo ("Error al introducir contraseña");
        }

    }else{
        echo ("El usuario no existe");
    }

?>