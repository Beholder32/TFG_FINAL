<form id="alta-contacto" name="alta_form" action="agregar-contacto.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend><h2>Regístrate en nuestro Círculo</h2></legend>
        <div>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre_txt" placeholder="Escribe tu nombre" title="Tu nombre" required/>
        </div>
        </br>
        <div>
            <label for="email">Email: </label>
            <input type="text" id="email" name="email_txt" placeholder="Escribe tu email" title="Tu email" required/>
        </div>
        </br>
        <div>
            <label for="password">Password: </label>
            <input type="password" id="password" name="password_txt" placeholder="Escribe tu email" title="Tu contraseña" required/>
        </div>
        </br>
        <div>
            <label for="m">Sexo: </label>
            <input type="radio" id="m" name="sexo_rdo" title="Tu sexo" value="M" required/>&nbsp;<label for="m">Masculino</label>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" id="f" name="sexo_rdo" title="Tu sexo" value="F" required/>&nbsp;<label for="m">Femenino</label>
        </div>
        </br>
        <div>
            <label for="posicion">Posición otorgada: </label>
            <select id="posicion" name="posicion_slc" required>
                <option value="">- - -</option>
                <?php include("select-posicion.php") ?>
            </select>
        </div>
        </br>
        <div>
            <input type="submit" id="enviar-alta" name="enviar-btn" value="Inscribirse" />
        </div>
    </fieldset>
</form>