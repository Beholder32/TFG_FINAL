<?php

    if(empty($_GET["pais_slc"])){
        include("conexion.php");
    }

    include("funciones");
    $ejecutar_consulta = $conexion->query($consulta);
    $num_regs = $ejecutar_consulta->num_rows;
    
    if($num_regs == 0){
        echo("<br/><br/><span>No se encontraron registros con esta búsqueda</span><br/><br/>");
    }else{ ?>
        <br/><br/>
        <table>
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Nacimiento</th>
                    <th>Telefono</th>
                    <th>Pais</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($registro = $ejecutar_consulta->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $registro["email"]; ?></td>
                        <td><?php echo $registro["nombre"]; ?></td>
                        <td><?php echo ($registro["sexo"]=="M")?"Masculino":"Femenino"; ?></td>
                        <td><?php echo $registro["nacimiento"]; ?></td>
                        <td><?php echo $registro["telefono"]; ?></td>
                        <td><?php echo $registro["pais"]; ?></td>
                        <td><img src="img/fotos/<?php echo $registro["imagen"]; ?>"  /></td>
                    </tr>
                    <?php
                    }
                    ?>
            </tbody>
        </table>
    <?php
    }
?>