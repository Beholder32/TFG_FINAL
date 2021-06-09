<?php
    
    include("conexion.php");
    $consulta="SELECT * FROM programas";
    $ejecutar_consulta = $conexion->query($consulta);

    while($registro = $ejecutar_consulta->fetch_assoc()){
        $nombre_programa = $registro["nombre_programa"];
        $id_programa = $registro["id_programa"];
        echo "<option value='$id_programa'>$nombre_programa</option>";
    }

?>