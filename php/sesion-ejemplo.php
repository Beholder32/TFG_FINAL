<?php include("sesion.php") ?>
<h1>Hola <span style="color: red;"><?php echo $_SESSION["usuario"]; ?></span></h1>
<br/>
<br/>
<h3>Has iniciado una sesion segura <span style="color: red;"><?php echo $_SESSION["usuario"]; ?></span></h3>
<br/>
<h3>Tus dados son los siguientes: </h3>
<br/>
<?php $nombre = $_SESSION["usuario"]; ?>
<span> El nombre es: <?php echo $nombre ?> </span>
</br>
<span>Apellidos <?php echo $_SESSION["apellidos"]; ?></span>
</br>
<span>Edad <?php echo $_SESSION["edad"]; ?></span>
</br>
<span>Altura <?php echo $_SESSION["altura"]; ?></span>
</br>
<span>Peso <?php echo $_SESSION["peso"]; ?></span>
</br>
<span>Sexo <?php echo $_SESSION["sexo"]; ?></span>
</br>
<span>Programa <?php echo $_SESSION["id_programa"]; ?></span>
</br>
<span>Fecha <?php echo $_SESSION["dia"] ?></span>
</br>
<span>Fecha Ingles<?php echo $_SESSION["dia-ingles"] ?></span>
</br>
<span>Ejercicios <?php echo $_SESSION["ejercicios"] ?> </span>
</br>
</br>
<?php 
    $listado = $_SESSION["ejercicios"];
    $listaEjer = explode(",",$listado);

    for($i =0; $i<count($listaEjer); $i++){
        echo($listaEjer[$i].'</br>');
    }
?>
</br>
</br>
<span>Cantidad de veces que se repite una parte del cuerpo</span>
</br>
<?php 

$piernas = 0;
$brazos = 0;
$abdomen = 0;
$espalda = 0;

$listado = $_SESSION["ejercicios"];

echo(substr_count($listado,'Piernas').'</br>');
echo('Brazos aparece: '.(substr_count($listado,'Brazos')).'</br>');
echo('Abdomen aparece: '.(substr_count($listado,'Abdomen')).'</br>');
echo('Espalda aparece: '.(substr_count($listado,'Espalda')).'</br>');

?>
<ul id="tablaEjercicios">

</ul>

</br>
<span>Email <?php echo $_SESSION["email"]; ?></span>
</br>
<span>Foto <?php echo $_SESSION["foto"]; ?></span>
<img src="../img/fotos/<?php echo $_SESSION["foto"]; ?>" >
</br>
</br>
<a href="salir.php">Salir</a>