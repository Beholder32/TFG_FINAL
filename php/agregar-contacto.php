<?php
    //Se asignan los valores recogidos en el formulario (el identificador del valor recogido es el 'name') a variables
    $nombre = $_POST["nombre_txt"];
    $apellido = $_POST["apellidos_txt"];
    $edad = $_POST["edad_txt"];
    $altura = $_POST["altura_txt"];
    $peso = $_POST["peso_txt"];
    $sexo = $_POST["sexo_rdo"];
    $programa = $_POST["programa_slc"];
    $email = $_POST["email_txt"];
    $password = $_POST["password_txt"];
    echo($nombre.' '.$apellido.' '.$edad.' '.$altura.' '.$peso.' '.$sexo.' '.$programa.' '.$email.' '.$password);

    //dependiendo el sexo ponemos una imagen predeterminada
    $imagen_generica = ($sexo=="M")?"profile_male.png":"profile_female.png";
    
    include("conexion.php");
    $consulta = "SELECT * FROM usuarios WHERE email='$email'";
    echo($consulta);
    $ejecutar_consulta = $conexion->query($consulta);
    $num_regs = $ejecutar_consulta->num_rows;
    echo($num_regs);
    
    
    if($num_regs == 0){
        
        //Se ejecuta la funcion para subir la imagen
	    include("funciones.php");
	    $tipo = $_FILES["foto_fls"]["type"];
	    $archivo = $_FILES["foto_fls"]["tmp_name"];
	    $se_subio_imagen = subir_imagen($tipo,$archivo,$email);

	    //Si la foto en el formulario viene vacia, entonces le asigno el valor de la imagen genérica, sino entonces el nombre de la foto que se subio.
	    $imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;
        
        echo($imagen);
        $consulta = "INSERT INTO usuarios (nombre,apellidos,edad,altura,peso,sexo,id_programa,email,password,foto) VALUES ('$nombre','$apellido','$edad','$altura','$peso','$sexo','$programa','$email','$password','$imagen');";
        echo($consulta);
        $ejecutar_consulta = $conexion->query($consulta);
    }else{
        echo ("Hay un usuario ya registrado con el emil <b>$email</b>");
    }
    
    $conexion->close();
    header("Location: ../index.php");
    
?>