<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Registro para la Secta</title>
        <style>
            body{
                font-family: Roboto, Arial;
                text-align: center;
            }
            form{
                margin: 0 auto;
                width: 400px;
            }
            span{
                color: red;
                font-size: 2em;
            }
            a{
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <h1>Seguidores de Baphomet</h1>
        <img src="img/logo.jpg"/>
        <form name="autentificacion_frm" action="php/control.php" method="POST" enctype="application/x-www-form-urlencoded">
            <?php
                error_reporting(E_ALL ^ E_NOTICE);
                if($_GET["error"]=="si"){
                    echo ("<span>Verifica tus Datos</span>");
                }else{
                    echo ("<span>Introduce tus datos</span>");
                }
            ?>
            <br/><br/>
            <label>Usuario (email del registro): </label>
            <input type="email" name="usuario_txt"><br/><br/>
            <label>Password: </label>
            <input type="password" name="password_txt"><br/><br/>
            <input type="submit" name="entrar_btn" value="Entrar"/>
        </form>
        <p><a href="php/alta-contacto.php">¿No eres miembro? Regrístrate</a></p>
    </body>
</html>