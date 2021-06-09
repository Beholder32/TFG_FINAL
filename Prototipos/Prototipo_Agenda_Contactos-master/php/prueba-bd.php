<?php
/*
Pasos para conectarme a una base de datos con PHP
1-Conectarme a la BD, mysql_connect necesita 3 datos:
    1-Servidor al que se va a conectar
    2-Usuario de la BD
    3-Password de ese usuario
*/

$conexion = mysqli_connect("localhost","root","admin") or die("No se pudo conectar con el servidor de bases de datos");
    echo("Estoy conectado a MySQL<br/>");


//2-Seleccionar la BD con la que vamos a trabajar

mysqli_select_db($conexion,"mis_contactos") or die ("No se pudo seleccionar la BD 'mis_contactos'");
echo("Base de datos seleccionada<br/>");

//3- Crear una consulta SQL
$consulta = "SELECT * FROM pais";

//4-Ejecutar la consulta SQL _ Necesita dos parametros 1º Conexion a la BD, 2º Consulta
$ejecutarConsulta = mysqli_query($conexion,$consulta) or die("No se pudo ejecutar la consulta en la BD");
echo("Se ejecutó la consulta SQL<br/>");

//5-Mostrar el resultado de la consulta, dentro de un bucle y en una variable ingresamos la función mysqli_fetch_array
while($registro = mysqli_fetch_array($ejecutarConsulta)){
    echo $registro["id_pais"]." - ".$registro["pais"]."<br/>";
}

//Cerrar la conexion a la base de datos
mysqli_close($conexion)or die("Ocurrió un error al cerrar la conexion a la BD");
echo ("Conexión cerrada");

?>