<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Login Form Demo</title>
  <style>
    body{
      background: url('img/bg.jpg') no-repeat center;
    }
  </style>
</head>
<body>
  <div class="login-wrapper">
    <form name="autentificacion_frm" action="php/control.php" method="POST" enctype="application/x-www-form-urlencoded" class="form">
      <?php
        error_reporting(E_ALL ^ E_NOTICE);
        if($_GET["error"]=="si"){
          echo ("<span>Verifica tus Datos</span>");
        }else{
          echo ("<span>Introduce tus datos</span>");
        }
      ?>
      <img src="img/logoProfile.png" alt="">
      <h2>Login</h2>
      <div class="input-group">
        <input type="text" name="usuario_txt" id="loginUser" required>
        <label for="loginUser">Correo de Usuario</label>
      </div>
      <div class="input-group">
        <input type="password" name="password_txt" id="loginPassword" required>
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" value="Login" class="submit-btn" name="entrar_btn">
      <a href="#forgot-pw" class="forgot-pw">¿No tienes cuenta? Regístrate</a>
    </form>

    <div id="forgot-pw">
      <form id="alta-contacto" name="alta_form" action="php/agregar-contacto.php" method="POST" enctype="multipart/form-data" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Regístrate</h2>
        <div class="input-group">
          <input type="text" name="nombre_txt" id="nombre" required>
          <label for="nombre">Nombre</label>
        </div>
        <div class="input-group">
          <input type="text" name="apellidos_txt" id="apellidos" required>
          <label for="apellidos">Apellidos</label>
        </div>
        <div class="input-group">
          <input type="text" name="edad_txt" id="edad" required>
          <label for="edad">Edad</label>
        </div>
        <div class="input-group">
          <input type="text" name="altura_txt" id="altura" required>
          <label for="altura">Altura</label>
        </div>
        <div class="input-group">
          <input type="text" name="peso_txt" id="peso" required>
          <label for="peso">Peso</label>
        </div>
        <div>
            <label for="m">Sexo: </label>
            <input type="radio" id="m" name="sexo_rdo" title="Tu sexo" value="M" required />&nbsp;<label for="m">Masculino</label>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" id="f" name="sexo_rdo" title="Tu sexo" value="F" required>&nbsp;<label for="f">Femenino</label>
        </div>
        </br>
        <div>
            <label for="foto">Foto:</label>
            <div class="adjuntar-archivo cambio">
                <input type="file" id="foto" name="foto_fls" title="Sube tu foto: " />
            </div>
        </div>
        </br>
        <div class="input-group">
          <label for="peso">Elige un programa</label>
          </br>
          </br>
          <select id="programa" name="programa_slc" required>
                <option value="">- - -</option>
                <?php include("php/select-programa.php") ?>
            </select>
        </div>
        </br>
        </br>
        <div class="input-group">
          <input type="email" name="email_txt" id="email" required>
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="password_txt" id="password" required>
          <label for="password">Password</label>
        </div>
        <input type="submit" value="Enviar" class="submit-btn">
      </form>
    </div>
  </div>
</body>
</html>