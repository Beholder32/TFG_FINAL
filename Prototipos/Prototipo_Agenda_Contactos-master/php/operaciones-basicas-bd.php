<?php

$conexion = mysqli_connect("localhost","root","admin") or die("No se pudo conectar con el servidor de bases de datos");
echo("Estoy conectado a MySQL<br/>");

mysqli_select_db($conexion,"mis_contactos") or die ("No se pudo seleccionar la BD 'mis_contactos'");
echo("Base de Datos: <b>mis_contactos</b> abierta<br/>");
echo("<h1>Las 4 operaciones básicas a una BD (CRUD)</h1><br/>");

echo("<h2>INSERCIÓN DE DATOS</h2><br/>");
// INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_campos)
//$consulta = "INSERT INTO contactos (email,nombre,sexo,nacimiento,telefono,pais,imagen) VALUES (
//'mggmonje@gmail.com','Miguel','M','1987-11-06','680198249','España','mikegonzalez.png')";

//$ejecutarConsulta = mysqli_query($conexion,$consulta) or die("No se pudo ejecutar la consulta en la BD");
//echo("Se han insertado los datos<br/>");

echo("<h2>ELIMINACIÓN DE DATOS</h2><br/>");
//DELETE FROM nombre_tabla WHERE campo = valor
//$consulta = "DELETE FROM contactos WHERE email = 'mgg_monje@gmail.com'";
//$ejecutarConsulta = mysqli_query($conexion,$consulta);
//echo ("Datos eliminados <br/>");

echo("<h2>ACTUALIZACIÓN DE DATOS</h2><br/>");
//UPDATE nombre_tabla SET nombre_campo = valor_campo, otro_campo = otro valor WHERE campo = valor;
//$consulta = "UPDATE contactos SET email = 'aprendiendo@gmail.com', nombre = 'Usuario', imagen = 'ejemplo.png' WHERE email ='mgg_monje@gmail.com'";
//$ejecutarConsulta = mysqli_query($conexion,$consulta);
//echo ("Datos actualizados <br/>");

echo("<h2>CONSULTA (BÚSQUEDA) DE DATOS</h2><br/>");
//SELECT * FROM nombre_tabla WHERE campo = valor;
$consulta = "SELECT * FROM contactos";
$ejecutarConsulta = mysqli_query($conexion,$consulta);

while($registro = mysqli_fetch_array($ejecutarConsulta)){
    echo $registro["email"]." - ".$registro["nombre"]." - ".$registro["sexo"]." - ".$registro["nacimiento"]." - ".$registro["telefono"]." - ".$registro["pais"]." - ".$registro["imagen"]."<br/>";
}

//Cerrar la conexion a la base de datos
mysqli_close($conexion)or die("Ocurrió un error al cerrar la conexion a la BD");
echo ("Conexión cerrada");


?>