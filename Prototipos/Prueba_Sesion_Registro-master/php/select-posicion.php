<?php
    
    include("conexion.php");
    $consulta="SELECT * FROM puesto";
    $ejecutar_consulta = $conexion->query($consulta);

    while($registro = $ejecutar_consulta->fetch_assoc()){
        $nombre_puesto = $registro["nombre_puesto"];
        $id_puesto = $registro["id_puesto"];
        echo "<option value='$id_puesto'>$nombre_puesto</option>";
    }

?>